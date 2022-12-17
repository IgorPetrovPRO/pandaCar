<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;
use Storage;

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
        return view("main.reviews.create");
    }

    public function store(ReviewRequest $request)
    {

        $data = $request->validated();

        if($request->hasFile('media')){
            $file = Storage::disk('public')->put('media', $request->file('media'));
            $fileType = $request->file('media')->extension();
            $data["media"] = $file;
            $data["media_type"] = $fileType;
        }
        Review::create($data);
        flash()->success('Отзыв успешно добавлена', 'Добавлено');
        return redirect(route("reviews.index"));
    }

    public function show(Review $review)
    {
    }

    public function edit(Review $review)
    {
        return view("main.reviews.edit", [
            "review" => $review,
        ]);
    }

    public function update(ReviewRequest $request, Review $review)
    {
        $data = $request->validated();

        if($request->has('media')){

            if($review->media){
                Storage::delete($review->media);
            }
            $file = Storage::disk('public')->put('media', $request->file('media'));
            $fileType = $request->file('media')->extension();
            $data["media"] = $file;
            $data["media_type"] = $fileType;
        }

        $review->update($data);
        flash()->success('Отзыв успешно обновлен', 'Обновлено');
        return redirect(route("reviews.index"));
    }

    public function destroy(Review $review)
    {
        $review->delete();
        flash()->success('Отзыв успешно удален', 'Удалено');
        return redirect(route("reviews.index"));
    }
}
