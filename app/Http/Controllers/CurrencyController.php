<?php

namespace App\Http\Controllers;
use App\Models\Currency;
use Illuminate\Http\Request;
class CurrencyController extends Controller
{
    public function update(Request $request)
    {
        $data = $request->toArray();
        foreach($data as $index => $v){
            if($currency = Currency::where('key','=', $index)->first()){
                $currency->value = $v;
                $currency->save();
            }
        }
        flash()->success('Курсы валют обновлены' ,'Обновлено');
        return back();
    }
}
