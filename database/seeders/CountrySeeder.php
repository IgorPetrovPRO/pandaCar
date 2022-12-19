<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run()
    {
        Country::insert([
            'name' => 'Россия',
            'position' => 1,
            'category' => '["1", "2", "3"]',
            'options'=> '{"1": {"nds": "0.2", "duty": "0.15", "property_1": "1500", "property_2": "2000", "property_3": "800", "property_4": "0.0025", "property_5": "300", "property_6": "150", "property_7": "210", "property_8": "700", "property_9": "0", "excise_duty": "0", "property_10": "1300", "property_11": "500", "property_12": "480", "property_13": "300", "property_14": "300", "property_15": "2500"}}',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Country::insert([
            'name' => 'Казахстан',
            'position' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Country::insert([
            'name' => 'Беларусь',
            'position' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Country::insert([
            'name' => 'Кыргыстан',
            'position' => 4,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Country::insert([
            'name' => 'Узбекистан',
            'position' => 5,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
