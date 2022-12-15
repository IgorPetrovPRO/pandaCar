@extends('../layout/' . $layout)

@section('head')
    <title>Авторизация - управление ботом</title>
@endsection

@section('content')
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Midone - HTML Admin Template" class="w-6"
                         src="{{ asset('build/assets/images/logo.svg') }}">
                    <span class="text-white text-lg ml-3">
                        {{ env('APP_NAME') }}
                    </span>
                </a>
                <div class="my-auto">
                    <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16"
                         src="{{ asset('build/assets/images/illustration.svg') }}">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">{!! __('login.title') !!}
                    </div>
                    <div
                        class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">{!! __('login.subtitle') !!}
                    </div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div
                    class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">{!! __('login.sign_in') !!}</h2>
                    <div
                        class="intro-x mt-2 text-slate-400 xl:hidden text-center">{!! __('login.title') !!} {!! __('login.subtitle') !!}
                    </div>
                    <div class="intro-x mt-8">
                        <form action="{{route('login.handle')}}" method="POST">
                            @csrf

                            <input name="email" id="email" type="text"
                                   class="intro-x login__input form-control py-3 px-4 block  @error('email') border-danger @enderror"
                                   placeholder="{{ __('login.email') }}" value="info@ipetrov.pro">
                            @error('email') {{$message}} @enderror
                            <input name="password" id="password" type="password"
                                   class="intro-x login__input form-control py-3 px-4 block mt-4 @error('password') border-danger @enderror"
                                   placeholder="{{ __('login.password') }}"
                                   value="password">

                            <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4 ">
                                <div class="flex items-center mr-auto">
                                    <input name="remember" id="remember-me" type="checkbox" class="form-check-input border mr-2" value="1">
                                    <label class="cursor-pointer select-none"
                                           for="remember-me">{{ __('login.remember') }}</label>
                                </div>
                                <a href="{{route('forgot')}}">{{ __('login.forgot_password') }}</a>
                            </div>
                            <div class="intro-x mt-5 xl:mt-58 text-center xl:text-left">
                                <button type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">
                                    {{ __('login.btn_login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="intro-x mt-10 xl:mt-24 text-slate-600 dark:text-slate-500 text-center xl:text-left">
                        {!! __('login.createdby', ['AUTHOR_SITE' => env('AUTHOR_SITE')]) !!}
                    </div>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
@endsection


