<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ChangePasswordRequest;

class ChangePasswordController extends Controller
{
    public function page()
    {
        return view('users.password');
    }

    public function update(ChangePasswordRequest $request){

        $user = auth()->user();

        $user->password = bcrypt($request->password);
        $user->save();


        flash()->info('Теперь вы можете его использовать','Пароль успешно изменен');
        return redirect()->route('password');


    }
}
