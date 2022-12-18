<?php


use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\CalcController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\FaqCategoriesController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Profile\ChangePasswordController;
use App\Http\Controllers\Profile\UserController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\ReviewsController;
use Illuminate\Support\Facades\Route;


Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');

Route::controller(SignInController::class)->middleware('loggedin')->group(function () {
    Route::get('login', 'page')->name('login');
    Route::post('login', 'handle')->name('login.handle');
});

Route::controller(ForgotPasswordController::class)->middleware('loggedin')->group(function () {
    Route::get('/forgot-password', 'page')->middleware('guest')->name('forgot');
    Route::post('/forgot-password', 'handle')->middleware('guest')->name('forgot.handle');
});

Route::controller(ResetPasswordController::class)->middleware('loggedin')->group(function () {
    Route::get('/reset-password/{token}', 'page')->middleware('guest')->name('password.reset');
    Route::post('/reset-password/{token}', 'handle')->middleware('guest')->name('password-reset.handle');
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [SignInController::class, 'logout'])->name('logout');
    Route::get('/', [HomeController::class, 'page'])->name('home');

    Route::controller(UserController::class)->group(function () {
        Route::get('profile', 'page')->name('profile');
        Route::post('profile', 'update')->name('profile.update');
    });

    Route::controller(ChangePasswordController::class)->group(function () {
        Route::get('change-password', 'page')->name('password');
        Route::post('change-password', 'update')->name('password.update');
    });

    Route::resource('countries', CountriesController::class);
    Route::controller(CalcController::class)->group(function (){
        Route::get('calc/{country}/{category}', 'index')->name('calc');
        Route::post('calc/{country}/{category}', 'update')->name('calc.update');
        Route::get('count/{price}/{country}/{category}', 'calculation')->name('calc.calculation');
    });


    Route::resource('cities', CitiesController::class);
    Route::resource('faq-categories', FaqCategoriesController::class);
    Route::resource('faqs', FaqsController::class);
    Route::resource('reviews', ReviewsController::class);
    Route::resource('properties', PropertiesController::class);
    Route::resource('categories', CategoriesController::class);


});
