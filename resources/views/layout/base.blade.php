<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      class="{{ $dark_mode ? 'dark' : 'light' }} default">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="{{ asset('build/assets/images/logo.svg') }}" rel="shortcut icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ipetrov.pro">

    @yield('head')

    <!-- BEGIN: CSS Assets-->
    @vite('resources/css/app.css')
    <!-- END: CSS Assets-->

    @if($message = flash()->get())
        <!-- BEGIN: Notification Content -->
        <div id="notification-content" class="toastify-content hidden flex">
            <i class="{{$message->class()}}" data-lucide="{{$message->icon()}}"></i>
            <div class="ml-4 mr-4">
                <div class="font-medium">{{$message->title()}}</div>
                <div class="text-slate-500 mt-1">{{$message->message()}}</div>
            </div>
        </div> <!-- END: Notification Content -->
    @endif
</head>
<!-- END: Head -->

@yield('body')
</html>
