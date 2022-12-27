<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function update(Request $request)
    {
        $data = $request->toArray();
        foreach($data as $index => $v){
            if($currency = Setting::where('key','=', $index)->first()){
                $currency->text = $v;
                $currency->save();
            }
        }
        flash()->success('Тексты обновлены' ,'Обновлено');
        return back();
    }

}
