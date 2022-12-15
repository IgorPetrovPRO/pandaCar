<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordFormRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;


class ResetPasswordController extends Controller
{

    public function page()
    {
        return view('auth.reset',['layout' => 'login']);
    }

    public function handle(ResetPasswordFormRequest $request) : RedirectResponse
    {
        $status = Password::reset(
            $request->only('email','password','password_confirmation','token'),
            function($user,$password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                ])->setRememberToken(str()->random(60));

                $user->save();
                event(new PasswordReset($user));
            }
        );

        if( $status === Password::PASSWORD_RESET ){
            flash()->info(__($status),'Пароль успешно изменен');
            return redirect()->route('login');
        }

        flash()->alert(__($status),'Ошибка');
        return back()->withErrors(['email' => [__($status)]]);

    }

}
