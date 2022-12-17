<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index(Request $request)
    {
        $text = $request->text;
        $per_page = $request->per_page ?? 10;
        $reviews = Review::where('name', 'LIKE', "%{$text}%")
            ->orderBy("created_at", "DESC")
            ->paginate($per_page)
            ->withQueryString();

        return view("main.reviews.index", [
            "reviews" => $reviews,
        ]);
    }

    public function create()
    {
        return view("main.reviews.create", []);
    }

    public function store(ReviewRequest $request)
    {
        Review::create($request->validated());
        flash()->success('Отзыв успешно добавлена', 'Добавлено');
        return redirect(route("countries.index"));
    }

    public function show(Review $review)
    {
    }

    public function edit(Review $review)
    {
        return view("main.reviews.create", [
            "review" => $review,
        ]);
    }

    public function update(ReviewRequest $request, Review $review)
    {
        $review->update($request->validated());
        return redirect(route("reviews.index"));
    }

    public function destroy(Review $review)
    {
        $review->delete();
        flash()->success('Отзыв успешно удален', 'Удалено');
        return redirect(route("countries.index"));
    }
}
