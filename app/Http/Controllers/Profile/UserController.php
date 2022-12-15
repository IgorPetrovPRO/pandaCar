<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfileRequest;
use Illuminate\Http\RedirectResponse;
use Storage;


class UserController extends Controller
{
    public function page()
    {
        $user = auth()->user();
        return view('users.profile', compact('user'));
    }

    public function update(ProfileRequest $request): RedirectResponse
    {
        $user = auth()->user();
        $data = $request->validated();

        if($request->has('photo')){

            if($user->photo){
                Storage::delete($user->photo);
            }

            $photo = $request->file('photo')->store('/users');
            $data["photo"] = $photo;
        }

        $user->update($data);
        flash()->success('Данные успешно обновлены','Обновлено');
        return redirect(route("profile"));
    }

}
