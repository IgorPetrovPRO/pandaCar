<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public function index(Request $request)
    {
        return redirect(route('faq-categories.index'));
    }

    public function create(Request $request)
    {
        $last_position = Faq::where('faq_category_id', '=',$request->category)->count() + 1;
        return view("main.faqs.create",[
            'category' => $request->category,
            'last_position' => $last_position,
        ]);
    }

    public function store(FaqRequest $request)
    {
        $faq = Faq::create($request->validated());
        flash()->success('Вопрос успешно добавлена', 'Добавлено');
        return redirect(route("faq-categories.edit", $faq->faq_category_id));
    }

    public function show(Faq $faq)
    {
    }

    public function edit(Faq $faq)
    {
        return view("main.faqs.edit", [
            "faq" => $faq,
        ]);
    }

    public function update(FaqRequest $request, Faq $faq)
    {
        $faq->update($request->validated());
        flash()->success('Вопрос успешно обновлен', 'Обновлен');
        return redirect(route("faq-categories.edit",$faq->faq_category_id));
    }

    public function destroy(Faq $faq)
    {
        $category = $faq->faq_category_id;
        $faq->delete();
        flash()->success('Вопрос успешно удален', 'Удалено');
        return redirect(route("faq-categories.edit",$category));
    }
}
