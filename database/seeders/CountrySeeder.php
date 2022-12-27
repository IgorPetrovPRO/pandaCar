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
            'properties'=> '{"1": {"nds": "0", "duty": "0.15", "property_1": "1500", "property_2": "2000", "property_3": "800", "property_4": "0.0025", "property_5": "300", "property_6": "150", "property_7": "220", "property_8": "700", "property_9": "200", "excise_duty": "0", "property_10": "1300", "property_11": "500", "property_12": "480", "property_13": "300", "property_14": "300", "property_15": "2500", "property_19": "60", "property_21": "350", "convertation": "0.1"}, "2": {"nds": "0.12", "duty": "0.15", "property_1": "1500", "property_2": "2000", "property_3": "800", "property_4": "0.0025", "property_5": "300", "property_6": "150", "property_7": "220", "property_8": "700", "property_9": "200", "excise_duty": "0", "property_10": "1300", "property_11": "500", "property_12": "480", "property_13": "300", "property_14": "300", "property_15": "3000", "property_19": "60", "property_21": "350", "convertation": "0.1"}, "3": {"nds": "0.12", "duty": "0.15", "property_1": "1500", "property_2": "2000", "property_3": "800", "property_4": "0.0025", "property_5": "300", "property_6": "150", "property_7": "220", "property_8": "700", "property_9": "200", "excise_duty": "0", "property_10": "1300", "property_11": "500", "property_12": "480", "property_13": "300", "property_14": "300", "property_15": "3500", "property_19": "60", "property_21": "350", "convertation": "0.1"}}',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Country::insert([
            'name' => 'Казахстан',
            'options' => '{"1": {"nds": "0", "duty": "0", "property_1": "1500", "property_2": "2500", "property_3": "0", "property_4": "0", "property_5": "0", "property_6": "0", "property_7": "0", "property_8": "0", "property_9": "0", "excise_duty": "0", "property_10": "0", "property_11": "0", "property_12": "0", "property_13": "0", "property_14": "0", "property_15": "0", "property_19": "0", "property_21": "0", "convertation": "0"}}',
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
