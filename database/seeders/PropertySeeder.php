<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    public function run()
    {
        Property::insert([
            'name' => 'Фиксированная часть',
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
            'name' => 'Конвертация для оплаты сумма фикса(без процентов)',
            'key' => 'convertation_sum',
            'type' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Property::insert([
            'name' => 'Конвертация для оплаты %',
            'key' => 'convertation_percent',
            'type' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Property::insert([
            'name' => 'Комиссия агента',
            'type' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
