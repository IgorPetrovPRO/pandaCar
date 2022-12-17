<?php

namespace App\Http\Controllers;

use App\Http\Requests\CitiesRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function index(Request $request)
    {

    }

    public function create(Request $request)
    {
        $last_position = City::where('country_id', '=',$request->country)->count() + 1;
        return view("main.cities.create",[
            'country' => $request->country,
            'last_position' => $last_position,
        ]);
    }

    public function store(CitiesRequest $request)
    {
        $city = City::create($request->validated());
        flash()->success('Город успешно добавлен', 'Добавлено');
        return redirect(route("countries.edit", $city->country_id));
    }

    public function show(City $city)
    {
    }

    public function edit(Request $request, City $city)
    {
        return view("main.cities.edit", [
            "city" => $city,
        ]);
    }

    public function update(CitiesRequest $request, City $city)
    {
        $city->update($request->validated());
        flash()->success('Город успешно обновлен', 'Обновлен');
        return redirect(route("countries.edit", $city->country_id));
    }

    public function destroy(City $city)
    {
        $country_id = $city->country_id;
        $city->delete();
        flash()->success('Город успешно удален', 'Удалено');
        return redirect(route("countries.edit",$country_id));
    }
}
