<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public function index(Request $request)
    {
        $text = $request->text;
        $per_page = $request->per_page ?? 10;
        $faqs = Faq::where('question', 'LIKE', "%{$text}%")
            ->orderBy("created_at", "DESC")
            ->paginate($per_page)
            ->withQueryString();

        return view("main.faqs.index", [
            "faqs" => $faqs,
        ]);
    }

    public function create()
    {
        return view("main.faqs.create", []);
    }

    public function store(FaqRequest $request)
    {
        Faq::create($request->validated());
        flash()->success('Страна успешно добавлена', 'Добавлено');
        return redirect(route("faqs.index"));
    }

    public function show(Faq $faq)
    {
    }

    public function edit(Faq $faq)
    {
        return view("main.faqs.create", [
            "faq" => $faq,
        ]);
    }

    public function update(FaqRequest $request, Faq $faq)
    {
        $faq->update($request->validated());
        return redirect(route("faqs.index"));
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        flash()->success('Страна успешно удалена', 'Удалено');
        return redirect(route("faqs.index"));
    }
}
