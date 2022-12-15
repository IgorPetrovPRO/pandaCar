@extends('users.layout.profile')

@section('page-title', __('profile.change_password.title') )
@section('page-subtitle', __('profile.change_password.title') )

@section('inner-content')
    <div class="flex flex-col-reverse xl:flex-row flex-col">
        <form action="{{route('password.update')}}" class="flex-1 mt-6 xl:mt-0" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-12 gap-x-5">
                <div class="col-span-12 2xl:col-span-6">

                    <x-profile-input placeholder="{{ __('profile.input.password.placeholder') }}" value="" name="password" type="password">
                        {{ __('profile.input.password.label') }}
                    </x-profile-input>

                    <x-profile-input placeholder="{{ __('profile.input.password_confirmation.placeholder') }}" value="" name="password_confirmation" type="password">
                        {{ __('profile.input.password_confirmation.label') }}
                    </x-profile-input>

                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3 p-2">Изменить</button>
        </form>
    </div>
@endsection
