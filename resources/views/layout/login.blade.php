@extends('../layout/base')


@section('body')
    <body class="login">
    @yield('content')
    @include('../layout/components/dark-mode-switcher')

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
    <!-- BEGIN: JS Assets-->
    @vite('resources/js/app.js')
    <!-- END: JS Assets-->

    @yield('script')
    </body>
@endsection
