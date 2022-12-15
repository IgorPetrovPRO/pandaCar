<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallBot extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bot:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Bots from Zero';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $this->call('storage:link');
        $this->call('migrate',[
            '--seed'=> true,
        ]);
        return Command::SUCCESS;
    }
}
