@extends('users.layout.profile')

@section('page-title', __('profile.personal_data.title') )
@section('page-subtitle', __('profile.personal_data.title') )

@section('inner-content')
    <div class="flex flex-col-reverse xl:flex-row flex-col">
        <form action="{{route('profile.update')}}" class="flex-1 mt-6 xl:mt-0" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-12 gap-x-5">
                <div class="col-span-12 2xl:col-span-6">

                    <x-profile-input placeholder="{{ __('profile.input.name.placeholder') }}" value="{{ old('name') ?: $user->name}}" name="name">
                        {{ __('profile.input.name.label') }}
                    </x-profile-input>

                    <x-profile-input placeholder="{{ __('profile.input.email.placeholder') }}" value="{{old('email')?:$user->email}}" name="email">
                        {{ __('profile.input.email.label') }}
                    </x-profile-input>

                    <x-profile-input type="file" name="photo"></x-profile-input>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3 p-2">Сохранить</button>
        </form>
    </div>
@endsection
