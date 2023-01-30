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
            'category' => '["1","2","3"]',
            'properties' => '{"1": {"nds": "0","duty": "0.15","property_1": "11880","property_2": "0.0025","property_8": "0","excise_duty": "0","convertation_sum": "7130","convertation_percent": "0.1"},"2": {"nds": "0.12","duty": "0.15","property_1": "12220","property_2": "0.0025","property_8": "0","excise_duty": "0","convertation_sum": "6970","convertation_percent": "0.1"},"3": {"nds": "0.12","duty": "0.15","property_1": "12280","property_2": "0.0025","property_8": "0","excise_duty": "0","convertation_sum": "7030","convertation_percent": "0.1"}}',
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
