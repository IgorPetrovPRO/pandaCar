<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class ReviewRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => ['required','max:255'],
            'description' => ['required','max:255'],
            'media' => ['file'],
            'author_link' => [],
            'city' => [],
        ];
    }


}
