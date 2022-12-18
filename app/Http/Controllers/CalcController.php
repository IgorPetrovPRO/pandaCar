<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Property;
use Illuminate\Http\Request;


class CalcController extends Controller
{
    public function index(Country $country,Category $category)
    {
        $calc = [];

        if($country->properties){
            $propertiesData = json_decode($country->properties,1);
            if(array_key_exists($category->id,$propertiesData)){
                $calc = $propertiesData[$category->id];
            }
        }
        $properties = Property::get();
        return view('main.calc.edit',[
            'country' => $country,
            'category' => $category,
            'properties' => $properties,
            'calc' => $calc
        ]);
    }
    public function update(Request $request, Country $country,Category $category)
    {
        $existProperties = json_decode($country->properties,1);
        $existProperties[$category->id] = $request->toArray();
        unset($existProperties[$category->id]['_token']);
        $existProperties = json_encode($existProperties,1);

        $country->properties = $existProperties;
        if($country->save()){
            flash()->success('Параметры успешно обновлены','Обновлено');
            return redirect(route('countries.edit',$country->id));
        }else{
            flash()->alert('Параметры НЕ обновлены','Ошибка');
            return back();
        }


    }
}
