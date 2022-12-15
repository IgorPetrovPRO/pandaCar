@extends('../layout/' . $layout)

@section('subhead')
    <title>@yield('page-title') - {{ env('APP_NAME') }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">@yield('page-title')</h2>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <!-- BEGIN: Profile Menu -->
        <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
            <div class="intro-y box mt-5">
                <div class="relative flex items-center p-5">
                    <div class="w-12 h-12 image-fit">
                        <img src="{{auth()->user()->getPhotoUrlAttribute()}}">
                    </div>
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-base">{{auth()->user()->name}}</div>
                        <div class="text-slate-500"></div>
                    </div>
                </div>
                <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    @foreach($menuProfile->all() as $item)
                        <a class="flex items-center mb-5  @if($item->isActive()) text-primary font-medium @endif" href="{{ $item->link() }}">
                            <i data-lucide="{{$item->icon()}}" class="w-4 h-4 mr-2"></i> {{$item->label()}}
                        </a>
                    @endforeach
                </div>

            </div>
        </div>
        <!-- END: Profile Menu -->

        <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
            <!-- BEGIN: Display Information -->
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">@yield('page-subtitle')</h2>
                </div>
                <div class="p-5">
                    @yield('inner-content')
                </div>
            </div>
            <!-- END: Display Information -->

        </div>
    </div>
@endsection
