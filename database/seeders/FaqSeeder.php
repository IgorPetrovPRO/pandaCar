<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run()
    {
        Faq::insert([
            'faq_category_id' => 1,
            'position' => 1,
            'question' => 'Сколько по времени занимает доставка?',
            'answer' => 'Так как мы отправляем авто в разные страны, то на этот вопрос нет универсального ответа. Но в среднем это от 1 до 4 месяцев, в зависимости от конечного адреса.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Faq::insert([
            'faq_category_id' => 1,
            'position' => 2,
            'question' => 'Хочу узнать условия доставки электрокара до моего города?',
            'answer' => 'Краткие условия по заказу электрокара из Китая можно почитать по этой <a href="https://docs.google.com/document/d/1rWVbQ_ZUgRCmDLzkxfsEDysUFOEgbNwbfb2yIXTVM0M/edit">ссылке</a> либо связаться  с менеджером по телефону или в чате <a href="https://t.me/Pandacar_booking">@pandacar_booking</a>.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        Faq::insert([
            'faq_category_id' => 2,
            'position' => 1,
            'question' => 'Могу ли я оплатить электрокар как юридическое лицо?',
            'answer' => 'Если вы хотите  оплатить и привезти авто от имени компании, то вам потребуется сертификат ОТТС (Одобрения типа транспортного средства).
Процедура получения этого сертификата очень долгая и дорогостоящая. Если вы НЕ  собираетесь заниматься автомобильным бизнесом по импорту автомобилей из Китая и других стран, то этот вариант точно не подходит.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Faq::insert([
            'faq_category_id' => 2,
            'position' => 2,
            'question' => 'Можете ли вы привезти автомобиль, на который не снимали обзор или которого нет в объявлениях на канале @pandacar_ru ?',
            'answer' => 'Теоретически мы можем доставить любой электромобиль под ключ в некоторые страны. Отправить можем во многие страны Европы, Америки, Африки и другие континенты. Не работаем с битыми авто, отдельными узлами и очень уставшими б/у старше 5 лет.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Faq::insert([
            'faq_category_id' => 2,
            'position' => 3,
            'question' => 'В какой валюте можно оплачивать инвойс?',
            'answer' => 'Мы принимаем к оплате доллары, юани, рубли, тенге.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Faq::insert([
            'faq_category_id' => 2,
            'position' => 4,
            'question' => 'Сколько времени идет платеж в Китай?',
            'answer' => 'Сроки транзакции от 1 до 10 рабочих дней в зависимости от страны банка корреспондента.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        Faq::insert([
            'faq_category_id' => 3,
            'position' => 1,
            'question' => 'С кем будет заключаться договор при покупке электрокара?',
            'answer' => 'Агентский договор заключается между покупателем и одним из наших представительств в России или Казахстане.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Faq::insert([
            'faq_category_id' => 3,
            'position' => 2,
            'question' => 'Если вы находитесь в Китае, а я в России, Украине, Казахстане, Беларуси или в другой стране? Как тогда происходит сделка?',
            'answer' => 'У нас есть представительства в России (Санкт-Петербург) и в Казахстане (Алматы). Можете приехать и лично пообщаться с нашей командой в офисе. С остальными странами сделки осуществляются удаленно посредством договора.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Faq::insert([
            'faq_category_id' => 3,
            'position' => 3,
            'question' => 'Могу ли я приехать в Китай, купить себе авто и уехать на нем своим ходом?',
            'answer' => 'Нет. Во-первых в Китай сейчас практически невозможно попасть. Во-вторых, на автомобиле, который оформлен на экспорт запрещено передвигаться. Он имеет статус транзитного груза. В-третьих, это будет намного дороже, чем пользоваться услугами специализированных транспортных компаний и брокеров.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Faq::insert([
            'faq_category_id' => 3,
            'position' => 4,
            'question' => 'Вы работаете только под заказ или есть автомобили в наличии?',
            'answer' => 'Мы работаем под заказ с предоплатой за автомобиль 100%. В редких случаях у нас появляются авто в наличии в разных странах, мы об этом уведомляем в телеграм канале.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        Faq::insert([
            'faq_category_id' => 4,
            'position' => 1,
            'question' => 'Есть ли ресурс на русском языке, где можно ознакомиться с комплектациями и ценами по китайским электрокарам?',
            'answer' => 'На сайте pandacar.ru мы формируем каталог китайских электрокаров. Переводим на русский, добавляем новые модели и пишем блог об электромобилях. Также есть доска объявлений в телеграм канале @pandacar_ru',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Faq::insert([
            'faq_category_id' => 4,
            'position' => 2,
            'question' => 'Есть электромобили, которые необходимо активировать на территории КНР. Вы помогаете с этим вопросом?',
            'answer' => 'Да. Мы помогаем активировать электромобиль и в регистрации китайской сим-карты. Каждый запрос рассматривается индивидуально.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Faq::insert([
            'faq_category_id' => 4,
            'position' => 3,
            'question' => 'Как вы проверяете автомобили перед отправкой?',
            'answer' => 'В зависимости от состояния авто, есть два основных способа проверки. Если авто с пробегом, то заказывается независимая инспекция. Автомобиль проверяется по нескольким десяткам пунктов на предмет юридического происхождения, обременений, аварий, ЛКП, криминала, утопленника и тд.
Если автомобиль новый из салона или завода, достаточно нашего личного осмотра на предмет внешних повреждений, комплектации салона, бардачка и исправности основных узлов.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Faq::insert([
            'faq_category_id' => 4,
            'position' => 4,
            'question' => 'Возможно ли заказать к автомобилю дополнительные аксессуары, резину, диски, зарядные станции, зимние пакеты, наборы и тд?',
            'answer' => 'Да, это возможно. Но отправляем мы это отдельно от автомобиля, так как существует риск потери, хищения или конфискации всех лишних предметов из салона автомобиля на таможнях или перегонах.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Faq::insert([
            'faq_category_id' => 4,
            'position' => 5,
            'question' => 'Действует ли гарантия на ввезенный из Китая авто?',
            'answer' => 'На автомобили, импортированные из Китая на физическое лицо и не имеющие официального представительства в вашей стране, гарантия не распространяется.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Faq::insert([
            'faq_category_id' => 4,
            'position' => 6,
            'question' => 'Можно ли через вас заказать запчасти к автомобилю?',
            'answer' => 'Основное направление компании PandaWay, оптовая доставка товаров из Китая. Розничные заказы на запчасти принимаем пока только от тех клиентов, которые покупали авто через нас.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Faq::insert([
            'faq_category_id' => 4,
            'position' => 7,
            'question' => 'Как заряжать электрокар в России?',
            'answer' => 'Существуют быстрая и медленная зарядка. Быстрая зарядка – на 380 Вольт, медленная – на 220 Вольт. Быстрая зарядка осуществляется с помощью специальных зарядных станций, которыми постепенно оборудуются привычные заправки в России и странах ближнего зарубежья. Медленную зарядку можно осуществить от обычной розетки, например, в частном доме. Для китайского электромобиля есть переходник на евро вилку.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

    }
}
