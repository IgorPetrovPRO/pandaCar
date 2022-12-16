<?php

namespace App\Http\Webhooks;

use App\Models\Statistic;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
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
}
