<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $text = $request->text;
        $per_page = $request->per_page ?? 10;
        $category = Category::where('name', 'LIKE', "%{$text}%")
            ->orderBy("position", "ASC")
            ->paginate($per_page)
            ->withQueryString();

        return view("main.categories.index", [
            "categories" => $category,
        ]);
    }

    public function create()
    {
        $last_position = Category::count() + 1;
        return view("main.categories.create",[
            'last_position' => $last_position,
        ]);
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());
        flash()->success('Категория успешно добавлена', 'Добавлено');
        return redirect(route("categories.index"));
    }

    public function show(Category $category)
    {

    }

    public function edit(Category $category)
    {
        return view("main.categories.edit", [
            "category" => $category,
        ]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        flash()->success('Категория успешно обновлена', 'Обновлена');
        return redirect(route("categories.index"));
    }

    public function destroy(Category $category)
    {
        $category->delete();
        flash()->success('Категория успешно удалена', 'Удалено');
        return redirect(route("categories.index"));
    }
}
