<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordFormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;


class ForgotPasswordController extends Controller
{


    public function page()
    {
        return view('auth.forgot', ['layout' => 'login']);
    }

    public function handle(ForgotPasswordFormRequest $request) : RedirectResponse
    {

        $status = Password::sendResetLink(
            $request->only('email'),
        );


        if( $status === Password::RESET_LINK_SENT ){
            flash()->success(__($status),'Пароль успешно сброшен');

            return back();
        }

        flash()->alert(__($status),'Ошибка');
        return back()->withErrors(['email' => __($status)]);
    }


}
