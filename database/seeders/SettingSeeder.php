<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        Setting::insert([
            'key' => 'start_text',
            'name' => 'Текст приветствия',
            'text' => 'Добро пожаловать!
Вы можете выбрать интересующий вас раздел',
        ]);
        Setting::insert([
            'key' => 'calc_text',
            'name' => 'Текст расчета стоимости',
            'text' => 'Предварительная стоимость:
#amount руб
📍 В стоимость включено: цена авто, налоги, доставка',
        ]);
    }
}
