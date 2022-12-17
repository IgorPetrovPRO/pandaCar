<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqCategoryRequest;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqCategoriesController extends Controller
{
    public function index(Request $request)
    {
        $text = $request->text;
        $per_page = $request->per_page ?? 10;
        $faqCategories = FaqCategory::where('name', 'LIKE', "%{$text}%")
            ->orderBy("position", "ASC")
            ->paginate($per_page)
            ->withQueryString();

        return view("main.faqCategories.index", [
            "faqCategories" => $faqCategories,
        ]);

    }

    public function create()
    {
        $last_position = FaqCategory::count() + 1;
        return view("main.faqCategories.create",[
            'last_position' => $last_position
        ]);
    }

    public function store(FaqCategoryRequest $request)
    {
        $faq = FaqCategory::create($request->validated());
        flash()->success('Категория успешно добавлена', 'Добавлено');
        return redirect(route("faq-categories.edit", $faq->id));
    }

    public function show(FaqCategory $faqCategory)
    {
    }

    public function edit(Request $request, FaqCategory $faqCategory)
    {
        $text = $request->text;
        $per_page = $request->per_page ?? 10;
        $faqs = Faq::where('question', 'LIKE', "%{$text}%")
            ->whereFaqCategoryId($faqCategory->id)
            ->orderBy("position", "ASC")
            ->paginate($per_page)
            ->withQueryString();

        return view("main.faqCategories.edit", [
            "faqCategory" => $faqCategory,
            "faqs" => $faqs,
        ]);
    }

    public function update(FaqCategoryRequest $request, FaqCategory $faqCategory)
    {
        $faqCategory->update($request->validated());
        flash()->success('Категория успешно обновлена', 'Обновлена');
        return redirect(route("faq-categories.edit", $faqCategory->id));
    }

    public function destroy(FaqCategory $faqCategory)
    {
        $faqCategory->delete();
        flash()->success('Категория успешно удалена', 'Удалено');
        return redirect(route("faq-categories.index"));
    }
}
