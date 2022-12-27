<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    public function run()
    {
        Property::insert([
            'name' => 'Доставка до Хоргоса',
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Property::insert([
            'name' => 'Переход границы',
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Property::insert([
            'name' => 'Хоргос - Бишкек',
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Property::insert([
            'name' => 'Таможенный сбор',
            'type' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Property::insert([
            'name' => 'Взятка за растаможку по инвойсу',
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Property::insert([
            'name' => 'Экспертиза, декларация, стоянка, досмотр, эвакуатор',
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Property::insert([
            'name' => 'Вешалка гр Киргизии',
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Property::insert([
            'name' => 'Комиссия агента (Киргизия)',
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Property::insert([
            'name' => 'Комиссия Алматы (сопровождение)',
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Property::insert([
            'name' => 'Доставка Бишкек - Москва',
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Property::insert([
            'name' => 'СБКТС',
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Property::insert([
            'name' => 'Глонасс',
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Property::insert([
            'name' => 'ПТС',
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Property::insert([
            'name' => 'Утиль сбор',
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Property::insert([
            'name' => 'Непредвиденные расходы, комиссия',
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Property::insert([
            'name' => 'Пошлина',
            'key' => 'duty',
            'type' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Property::insert([
            'name' => 'НДС',
            'key' => 'nds',
            'type' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Property::insert([
            'name' => 'Акциз',
            'key' => 'excise_duty',
            'type' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Property::insert([
            'name' => 'Доверенность',
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Property::insert([
            'name' => 'Конвертация для оплаты 2 части',
            'key' => 'convertation',
            'type' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Property::insert([
            'name' => 'Предпродажная подготовка',
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
