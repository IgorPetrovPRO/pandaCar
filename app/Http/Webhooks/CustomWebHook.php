<?php

namespace App\Http\Webhooks;

use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\Property;
use App\Models\Review;
use App\Models\Setting;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Stringable;


class CustomWebHook extends WebhookHandler
{

    protected function handleChatMessage(Stringable $text): void
    {
        if (str_contains($this->chat->name, '[group]')) {
            return;
        }
        $text = trim(str_replace(' ', '', $text));
        if ($this->chat->storage()->get('country_id')) {
            if (is_numeric($text)) {
                $sum = (int)$text;
                $amount = $this->calculation($sum);

                if ($textTemplate = Setting::where('key', '=', 'calc_text')->first()) {
                    $amountUSD = number_format($amount, 0, '.', ' ');
                    $answerText = str_replace('#sum', $amountUSD, $textTemplate->text);

                    $usd = Currency::where('key','=','USD')->first();
                    $answerText = str_replace('#usd', '1$ = '.$usd->value.' руб', $answerText);

                    $amountRub = number_format(($amount * $usd->value), 0, '.', ' ');
                    $answerText = str_replace('#amount', $amountRub , $answerText);
                } else {
                    $answerText = "Предварительная стоимость:\n " . $amount . "руб. \n\n📍 В стоимость включено: цена авто, налоги, доставка";
                }

                $this->chat->html($answerText)->keyboard(
                    Keyboard::make()->buttons([
                        Button::make('Сделать новый расчет')->action('countryList'),
                    ])
                )->send();
            } else {
                $this->chat->html('Укажите число')->keyboard(
                    Keyboard::make()->buttons([
                        Button::make('или начните с начала')->action('returnBack'),
                    ])
                )->send();
            }
        } else {
            $this->notFound($text);
        }
    }

    public function start(): void
    {
        if (str_contains($this->chat->name, '[group]')) {
            return;
        }

        if ($textTemplate = Setting::where('key', '=', 'start_text')->first()) {
            $text = $textTemplate->text;
        } else {
            $text = "Добро пожаловать!\nВы можете выбрать интересующий вас раздел";
        }

        $this->chat->html($text)->keyboard(
            Keyboard::make()->buttons([
                Button::make('Рассчитать доставку авто')->action('countryList'),
                Button::make('Связаться с менеджером')->url('https://t.me/Pandacar_booking'),
                Button::make('FAQ')->action('faq'),
                Button::make('Отзывы клиентов')->action('reviews'),
            ])
        )->send();
    }

    public function returnBack(): void
    {
        if ($textTemplate = Setting::where('key', '=', 'start_text')->first()) {
            $text = $textTemplate->text;
        } else {
            $text = "Добро пожаловать!\nВы можете выбрать интересующий вас раздел";
        }

        $keyboard = Keyboard::make()->buttons([
            Button::make('Рассчитать доставку авто')->action('countryList'),
            Button::make('Связаться с менеджером')->url('https://t.me/Pandacar_booking'),
            Button::make('FAQ')->action('faq'),
            Button::make('Отзывы клиентов')->action('reviews'),
        ]);

        if ($this->data->get('type') === 'media') {
            $this->chat->editMedia($this->messageId)->html($text)->keyboard($keyboard)->send();
        } else {
            $this->chat->edit($this->messageId)->html($text)->keyboard($keyboard)->send();
        }
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

    public function faq(): void
    {
        $faqCategories = FaqCategory::orderBy('position', 'ASC')->get();
        $buttons = [];
        foreach ($faqCategories as $faqCategory) {
            $btn = Button::make($faqCategory->name)->action('questions')->param('value', $faqCategory->id);
            $buttons[] = $btn;
        }
        $buttons[] = Button::make('◀️ Назад')->action('returnBack');
        $keyboard = Keyboard::make()->buttons($buttons);
        $response = $this->chat->edit($this->messageId)
            ->html('Выберите категорию вопросов, которая вас интересует')
            ->keyboard($keyboard)
            ->send();
        if ($response->failed()) {
            Log::debug($response->dump());
        }
    }

    public function questions()
    {
        $faqs = Faq::where('faq_category_id', '=', $this->data->get('value'))->orderBy('position', 'ASC')->get();
        foreach ($faqs as $faq) {
            $text = "<b>" . $faq->question . "</b>\n" . $faq->answer;
            $this->chat->html($text)->withoutPreview()->send();
        }
        $this->chat->html('Вернуться к списку категорий')->keyboard(
            Keyboard::make()->buttons([
                Button::make('◀️ Назад')->action('faq'),
            ])
        )->withoutPreview()->send();
    }

    public function reviews(): void
    {
        $limit = 2;
        $offset = $this->data->get('offset') ?: 0;

        $reviews = Review::offset($offset)->limit($limit)->orderBy('created_at', 'DESC')->get();
        $total = Review::count();

        foreach ($reviews as $review) {
            $text = "<b>" . $review->name . "</b>\n" . $review->description . "\n";

            if ($review->media) {
                if ($review->media_type == 'mp4') {
                    $this->chat->document(env('APP_URL') . '/storage/' . $review->media)->html($text)->withoutPreview(
                    )->send();
                } else {
                    $this->chat->photo(env('APP_URL') . '/storage/' . $review->media)->html($text)->withoutPreview(
                    )->send();
                }
            } else {
                $this->chat->html($text)->withoutPreview()->send();
            }
        }
        if (($total - $limit - $offset) > 0) {
            if (($total - $limit - $offset) > $limit) {
                $showNum = $limit;
            } else {
                $showNum = $total - $limit - $offset;
            }


            $keyboard = Keyboard::make()->buttons([
                Button::make('Еще ' . $showNum . ' из ' . $total - $limit - $offset)->action('reviews')->param(
                    'offset',
                    $offset + $limit
                ),
                Button::make('В главное меню')->action('returnBack'),
            ]);
        } else {
            $keyboard = Keyboard::make()->buttons([
                Button::make('В главное меню')->action('returnBack'),
            ]);
        }

        $this->chat->html('Что делаем дальше?')->keyboard($keyboard)->withoutPreview()->send();
    }

    public function countryList(): void
    {
        $this->chat->storage()->forget('category_id');
        $this->chat->storage()->forget('country_id');
        $this->chat->storage()->forget('city_id');

        $countries = Country::orderBy('position', 'ASC')->get();
        $buttons = [];
        foreach ($countries as $country) {
            $btn = Button::make($country->name)->action('cities')->param('value', $country->id);
            $buttons[] = $btn;
        }
        $buttons[] = Button::make('◀️ Назад')->action('returnBack');
        $keyboard = Keyboard::make()->buttons($buttons);
        $response = $this->chat->edit($this->messageId)
            ->html('Выберите страну')
            ->keyboard($keyboard)
            ->send();
        if ($response->failed()) {
            Log::debug($response->dump());
        }
    }

    public function cities()
    {
        $cities = City::where('country_id', '=', $this->data->get('value'))->orderBy('position', 'ASC')->get();
        $this->chat->storage()->set('country_id', $this->data->get('value'));
        $this->chat->storage()->forget('city_id');

        if (sizeof($cities)) {
            $buttons = [];
            foreach ($cities as $city) {
                $btn = Button::make($city->name)->action('city')->param('value', $city->id);
                $buttons[] = $btn;
            }
            $buttons[] = Button::make('◀️ Назад')->action('countryList');
            $keyboard = Keyboard::make()->buttons($buttons);
            $response = $this->chat->edit($this->messageId)
                ->html('Выберите город')
                ->keyboard($keyboard)
                ->send();
            if ($response->failed()) {
                Log::debug($response->dump());
            }
        } else {
            $this->selectCategories();
        }
    }

    public function city(): void
    {
        $this->chat->storage()->set('city_id', $this->data->get('value'));
        $this->selectCategories();
    }

    public function selectCategories(): void
    {
        $this->chat->storage()->forget('category_id');

        $country = Country::where('id', '=', $this->chat->storage()->get('country_id'))->first();
        $showCategory = json_decode($country->category, 1);
        Log::debug($showCategory);

        $categories = Category::orderBy('position', 'ASC')->get();
        $buttons = [];
        foreach ($categories as $category) {
            if (in_array($category->id, $showCategory)) {
                $btn = Button::make($category->name)->action('waitPrice')->param('value', $category->id);
                $buttons[] = $btn;
            }
        }
        if ($this->chat->storage()->get('city_id')) {
            $buttons[] = Button::make('◀️ Назад')->action('cities')->param(
                'value',
                $this->chat->storage()->get('country_id')
            );
        } else {
            $buttons[] = Button::make('◀️ Назад')->action('countryList');
        }

        $keyboard = Keyboard::make()->buttons($buttons);
        $this->chat->edit($this->messageId)
            ->html('Выберите вид автомобиля')
            ->keyboard($keyboard)
            ->send();
    }

    public function waitPrice(): void
    {
        $this->chat->storage()->set('category_id', $this->data->get('value'));
        $buttons[] = Button::make('◀️ Назад')->action('selectCategories');
        $keyboard = Keyboard::make()->buttons($buttons);
        $this->chat->edit($this->messageId)->html('Введите сумму машины в Юанях')->keyboard($keyboard)->send();
    }

    protected function calculation(int $price): string
    {
        $currencyCNY = Currency::where('key', '=', 'CNY')->first();
        $currencyUSD = Currency::where('key', '=', 'USD')->first();
        $currencyUSDtoCNY = $currencyUSD->value / $currencyCNY->value;
        $price = $price / $currencyUSDtoCNY;
        //Log::debug($currencyUSDtoCNY);
        //Log::debug($price);
        if ($this->chat->storage()->get('country_id')) {
            $delivery = 0;
            $convertationCost = 0;
            $country = Country::find($this->chat->storage()->get('country_id'));

            if ($city = City::find($this->chat->storage()->get('city_id'))) {
                $delivery += $city->additional_cost;
            }

            $existProperties = json_decode($country->properties, 1);

            $category = $this->chat->storage()->get('category_id');
            //Log::debug($existProperties[$category]);
            foreach ($existProperties[$category] as $property => $value) {
                if (str_contains($property, 'property_')) {
                    $arr = explode('_', $property);
                    $propertyObj = Property::find($arr[1]);
                    if ($propertyObj->type == 2) {
                        $delivery += $price * $value;
                        //Log::debug($propertyObj->name. ' '. $price*$value);
                    } else {
                        $delivery += $value;
                        //Log::debug($propertyObj->name. ' '. $value);
                    }
                }

                //TODO - переделать в функцию, и дать возможность формировать формулы
                //Для конвертации - новый параметр
                if (in_array(
                    $property,
                    [
                        'property_1',
                        'property_2',
                        'property_3',
                        'property_4',
                        'property_5',
                        'property_6',
                        'property_7',
                        'property_19',
                        'property_8',
                        'property_9',
                        'property_10'
                    ]
                )) {
                    $arr = explode('_', $property);
                    $propertyObj = Property::find($arr[1]);
                    if ($propertyObj->type == 2) {
                        $convertationCost += $price * $value;
                    } else {
                        $convertationCost += $value;
                    }
                }
            }
            $convertationCost += $price * $existProperties[$category]['duty'];
            $convertationCost = $convertationCost * $existProperties[$category]['convertation'];
            //Log::debug('Конвертация '.$convertationCost);
            //Log::debug('Пошлина '. $price*$existProperties[$category]['duty']);
            $delivery += $price * $existProperties[$category]['duty'];


            //НДС расчет сложный момент
            $sumNds = $existProperties[$category]['nds'] * ($price + $price * $existProperties[$category]['duty'] + $price * $existProperties[$category]['excise_duty']);


            $delivery += $convertationCost;
            $delivery += $sumNds;
            $delivery += $price;

            return $delivery;
        } else {
            return 'не верные данные';
        }
    }
}
