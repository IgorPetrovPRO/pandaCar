<?php

namespace App\Console\Commands;

use App\Models\Currency;
use Illuminate\Console\Command;
use Log;


class CurrencyUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update currency from cbr.ru/scripts/XML_daily.asp';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $url = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req='.date("d/m/Y");
        $cbr = simplexml_load_file($url);
        foreach($cbr->Valute as $item) {
            if (in_array($item->NumCode,[840,156])) {
                $value = str_replace(",", ".", $item->Value);
                $value = $value/$item->Nominal;
                $currency = Currency::where('key','=',$item->CharCode)->first();
                $currency->value = $value;
                $currency->save();
            }
        }
        return Command::SUCCESS;
    }
}
