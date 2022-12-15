<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class ProfileRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        $user = auth()->user();
        return [
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email:dns', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable','image'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'email' => str(request('email'))
                ->squish()
                ->lower()
                ->value()
        ]);
    }


}
