<?php

namespace App\Http\Webhooks;

use App\Models\Brief;
use App\Models\ActiveBrief;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Statistic;

use DefStudio\Telegraph\Enums\ChatActions;
use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Stringable;


class CustomWebHook extends WebhookHandler
{


    protected function handleChatMessage(Stringable $text): void
    {
        if (str_contains($this->chat->name, '[group]')) {
            return;
        }
        $this->notFound($text);
    }

    protected function downloadFile(string $type): string
    {
        $id = $this->message->{$type}()->id();
        if ($type != 'voice') {
            $filename = explode('.', $this->message->{$type}()->filename());
            $extension = $filename[array_key_last($filename)];
        } else {
            $extension = 'ogg';
        }
        Telegraph::store(
            $id,
            Storage::path('public/bot/' . $type . '/' . $this->chat->chat_id),
            $id . '.' . $extension
        );
        $link = env('APP_URL') . '/storage/bot/' . $type . '/' . $this->chat->chat_id . '/' . $id . '.' . $extension;
        return $link;
    }

    public function start(): void
    {
        if (str_contains($this->chat->name, '[group]')) {
            return;
        }
        //TODO вынести в метод
        $startText = $this->data->toArray();
        if (array_key_exists('text', $startText)) {
            $valueStart = explode('_', $startText['text']);
            if (array_key_exists(1, $valueStart)) {
                $this->chat->storage()->set('statistic_id', $valueStart[1]);
            }
        }

        $text = "Добро пожаловать! Выберите, что вас интересует.";
        $this->chat->html($text)->keyboard(
            Keyboard::make()->buttons([
                Button::make('Оставить заявку')->action('makeOrder'),
            ])
        )->send();
    }

    public function returnBack(): void
    {
        $text = "Добро пожаловать! Выберите, что вас интересует.";

        $this->chat->edit($this->messageId)->html($text)->keyboard(
            Keyboard::make()->buttons([
                Button::make('Оставить заявку')->action('makeOrder'),
            ])
        )->withoutPreview()->send();
    }

    public function makeOrder(): void
    {
        $text = "Вы можете оставить свои контакты, чтобы вам перезвонил наш специалист, или же заполнить бриф, чтобы мы смогли основательно подготовиться к встрече.";
        $this->chat->edit($this->messageId)->html($text)->keyboard(
            Keyboard::make()->buttons([
                Button::make('Оставить контакты')->action('order')->param('id', '1'),
            ])
        )->withoutPreview()->send();
    }

    public function order(): void
    {
        $answer = $this->briefStart($this->chat->chat_id, $this->data->get('id'));
        $question = Question::where(['brief' => $this->data->get('id'), 'position' => $answer->position])->first();
        $this->getQuestion($question->id);
    }

    protected function notFound($text): void
    {
        $this->chat->html(
            "Ваш запрос <b>" . $text . "</b> не известен, начните все сначала"
        )->keyboard(
            Keyboard::make()->buttons([
                Button::make('Вернуться в начало')->action('returnBack'),
            ])
        )->send();
    }

    protected function briefStart(string $chat_id, int $brief): Answer
    {
        $activeBrief = ActiveBrief::firstOrCreate([
            'chat_id' => $chat_id,
        ]);
        $activeBrief->brief = $brief;
        $activeBrief->save();
        $statistic_id = $this->chat->storage()->get('statistic_id');
        $this->chat->storage()->forget('statistic_id');
        return Answer::firstOrCreate([
            'brief' => $brief,
            'chat_id' => $chat_id,
            'status' => 0,
            'position' => 1,
            'statistic_id' => $statistic_id,
        ]);
    }

    protected function getQuestion(int $id): void
    {
        $this->chat->message('')->chatAction(ChatActions::TYPING)->send();
        $question = Question::where(['id' => $id])->first();
        $totalQuestion = Question::where(['brief' => $question->brief])->count();
        if ($question) {
            $numberOfQuestion = "<b>Вопрос " . $question->position . " из " . $totalQuestion . "</b>";
            $response = $this->chat->html($numberOfQuestion . "\n" . $question->message)->send();
            if ($response->failed()) {
                Log::debug($response->dump());
            }
        } else {
            if ($id != 0) {
                $this->chat->html("Ошибка в поиск вопроса номер " . $id)->send();
            }
        }
    }

    protected function setAnswer(int $id, int $currentQ, int $nextQ = 0, $type = 'text', $text = ''): void
    {
        $answer = Answer::where(['id' => $id])->first();
        $data = $answer->data ? json_decode($answer->data, 1) : [];

        //Проверяем не последний ли это нужный вопрос
        $question = Question::where(['id' => $currentQ])->first();
        $questionProperties = $question->properties ? json_decode($question->properties, 1) : [];
        if (!empty($questionProperties) && $questionProperties['final']) {
            $answer->status = 1;
        }

        $data[$currentQ] = [$type => $text];
        $answer->data = $data;
        $answer->position = $nextQ;
        $answer->save();
        if (!empty($questionProperties) && $questionProperties['final']) {
            $this->getAnswers($id);
        }
    }

    public function getAnswers(int $id): void
    {
        $answer = Answer::where(['id' => $id])->first();
        if ($answer) {
            $brief = Brief::where(['id' => $answer->brief])->first();
            $text = "<b>Новая заявка</b> от " . $this->chat->name . "\n";
            $text .= "<i>" . $brief->name . "</i>\n\n";

            $data = $answer->data ? json_decode($answer->data, 1) : [];
            foreach ($data as $idx => $d) {
                $question = Question::where(['id' => $idx])->first();
                $text .= "<b>Вопрос:</b> " . $question->message . "\n";
                if (!empty($d['text'])) {
                    $text .= "<b>Ответ:</b> " . $d['text'] . "\n\n";
                }
                if (!empty($d['voice'])) {
                    $text .= "<b>Ответ:</b> <a href='" . $d['voice'] . "'>Прослушать ответ</a>\n\n";
                }
                if (!empty($d['video'])) {
                    $text .= "<b>Ответ:</b> <a href='" . $d['video'] . "'>Просмотреть видео ответ</a>\n\n";
                }
                if (!empty($d['document'])) {
                    $text .= "<b>Ответ:</b> <a href='" . $d['document'] . "'>Просмотреть приложенный файл</a>\n\n";
                }
            }

            if ($answer->statistic_id) {
                $statistic = Statistic::where(['id' => $answer->statistic_id])->first();
                $text .= "<b>Источник клиента</b>\n";
                $text .= "<b>utm_source:</b> " . $statistic->utm_source . "\n";
                $text .= "<b>utm_medium:</b> " . $statistic->utm_medium . "\n";
                $text .= "<b>utm_campaign:</b> " . $statistic->utm_campaign . "\n";
                $text .= "<b>utm_term:</b> " . $statistic->utm_term . "\n";
            }

            $chat = TelegraphChat::find(1);
            $chat->html($text)->withoutPreview()->send();

            //Благодарочка пользователю
            $this->chat->html(
                "Спасибо, мы получили вашу заявку. Скоро позвоним!"
            )->keyboard(
                Keyboard::make()->buttons([
                    Button::make('Вернуться')->action('returnBack'),
                ])
            )->send();
        }
    }
}
