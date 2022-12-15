<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class RefreshBot extends Command
{
    protected $signature = 'bot:refresh';

    protected $description = 'refresh bot for dev';

    public function handle(): int
    {
        if(app()->isProduction()){
            return  self::FAILURE;
        }
        $this->call('cache:clear');

        Storage::deleteDirectory('public/bot');
        $this->call('migrate:fresh',[
            '--seed'=> true,
        ]);



        return self::SUCCESS;
    }
}
