<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run()
    {
        City::insert([
            'name' => 'Москва',
            'country_id' => 1,
            'additional_cost' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        City::insert([
            'name' => 'Санкт-Петербург',
            'country_id' => 1,
            'additional_cost' => 150,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        City::insert([
            'name' => 'Екатеринбург',
            'country_id' => 1,
            'additional_cost' => 200,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        City::insert([
            'name' => 'Новосибирск',
            'country_id' => 1,
            'additional_cost' => 400,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        City::insert([
            'name' => 'Владивосток',
            'country_id' => 1,
            'additional_cost' => 500,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
