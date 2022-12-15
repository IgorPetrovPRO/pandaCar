<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;


class SignInFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->guest();
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email:dns','exists:users'],
            'password' => ['required'],

        ];
    }


}
