<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignInFormRequest;
use Illuminate\Http\RedirectResponse;

class SignInController extends Controller
{

    public function page()
    {
        return view('auth.index', ['layout' => 'login']);
    }


    public function handle(SignInFormRequest $request): RedirectResponse
    {
        if (!auth()->attempt($request->validated(), (bool)$request->remember)) {
            flash()->alert('Проверьте правильность введенных данных. Если что вы можете воспользоваться функцией восстановления пароля', 'Ошибка');
            return back();
        }

        $request->session()->regenerate();
        return redirect()->intended(route('home'));
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    }
}
