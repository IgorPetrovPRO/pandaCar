<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class CountryRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => ['required','min:3'],
            'position' => ['numeric'],
            'category' => [],
        ];
    }


}
