<?php

namespace App\Providers;

use App\Http\View\Composers\DarkModeComposer;
use App\Http\View\Composers\MenuComposer;
use App\Http\View\Composers\ViewComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Vite::macro('image',fn($asset) => $this->asset("build/assets/images/$asset"));

        View::composer('*', DarkModeComposer::class);
        View::composer('*', MenuComposer::class);
        View::composer('*',ViewComposer::class);

    }
}
