<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    public function run()
    {
        Currency::insert([
            'key' => 'CNY',
            'value'=> '9.5',
            'name' => 'Юань к рублю',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Currency::insert([
            'key' => 'USD',
            'value'=> '66.35',
            'name' => 'Доллар к рублю',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
