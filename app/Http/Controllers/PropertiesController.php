<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Models\Currency;
use App\Models\Property;
use App\Models\Setting;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function index(Request $request)
    {
        $currencies = Currency::get()->toArray();
        $settings = Setting::get()->toArray();
        $text = $request->text;
        $per_page = $request->per_page ?? 10;
        $properties = Property::where('name', 'LIKE', "%{$text}%")
            ->orderBy("created_at", "DESC")
            ->paginate($per_page)
            ->withQueryString();



        return view("main.properties.index", [
            "properties" => $properties,
            "currencies" => $currencies,
            "settings" => $settings,
        ]);
    }

    public function create()
    {
        return view("main.properties.create");
    }

    public function store(PropertyRequest $request)
    {
        Property::create($request->validated());
        flash()->success('Параметр успешно добавлен', 'Добавлено');
        return redirect(route("properties.index"));
    }

    public function show(Property $property)
    {
    }

    public function edit(Property $property)
    {
        return view("main.properties.edit", [
            "property" => $property,
        ]);
    }

    public function update(PropertyRequest $request, Property $property)
    {
        $property->update($request->validated());
        flash()->success('Параметр успешно обновлен', 'Обновлена');
        return redirect(route("properties.index"));
    }

    public function destroy(Property $property)
    {
        $property->delete();
        flash()->success('Параметр успешно удален', 'Удалено');
        return redirect(route("properties.index"));
    }

}
