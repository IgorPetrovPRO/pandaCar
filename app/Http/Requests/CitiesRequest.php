<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class CitiesRequest extends FormRequest
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
            'additional_cost' => ['numeric'],
            'country_id' => ['required']
        ];
    }


}
