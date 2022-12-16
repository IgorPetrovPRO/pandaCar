<?php

namespace Database\Seeders;

use DefStudio\Telegraph\Models\TelegraphBot;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Database\Seeder;

class TelegraphBotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TelegraphBot::insert([
            'token' => '5831497148:AAGBMyRtaOfj8-QXEmhTh-jWlc2iNfGfPdg',
            'name' => 'ipetrovpro_bot',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        TelegraphChat::insert([
            'chat_id' => '-679516203',
            'name' => '[group] ipetrov_lead',
            'telegraph_bot_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

    }
}


