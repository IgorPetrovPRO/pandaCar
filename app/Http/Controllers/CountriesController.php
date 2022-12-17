<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    public function index(Request $request)
    {
        $text = $request->text;
        $per_page = $request->per_page ?? 10;
        $countries = Country::where('name', 'LIKE', "%{$text}%")
            ->orderBy("position", "ASC")
            ->paginate($per_page)
            ->withQueryString();

        return view("main.countries.index", [
            "countries" => $countries,
        ]);
    }

    public function create()
    {
        $last_position = Country::count() + 1;
        return view("main.countries.create",[
            'last_position' => $last_position
        ]);
    }

    public function store(CountryRequest $request)
    {
        $country = Country::create($request->validated());
        flash()->success('Страна успешно добавлена', 'Добавлено');
        return redirect(route("countries.edit", $country->id));
    }

    public function show(Country $country)
    {
    }

    public function edit(Request $request, Country $country)
    {
        $text = $request->text;
        $per_page = $request->per_page ?? 10;
        $cities = City::where('name', 'LIKE', "%{$text}%")
            ->whereCountryId($country->id)
            ->orderBy("position", "ASC")
            ->paginate($per_page)
            ->withQueryString();

        return view("main.countries.edit", [
            "country" => $country,
            "cities" => $cities,
        ]);
    }

    public function update(CountryRequest $request, Country $country)
    {
        $country->update($request->validated());
        flash()->success('Страна успешно обновлена', 'Обновлена');
        return redirect(route("countries.edit", $country->id));
    }

    public function destroy(Country $country)
    {
        $country->delete();
        flash()->success('Страна успешно удалена', 'Удалено');
        return redirect(route("countries.index"));
    }
}
