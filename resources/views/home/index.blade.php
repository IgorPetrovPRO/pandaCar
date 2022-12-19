@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ __('main.general_title') }} - {{env('APP_NAME')}}</title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-12">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">{{ __('main.general_title') }}</h2>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="user" class="report-box__icon text-success"></i>
{{--                                        <div class="ml-auto">--}}
{{--                                            <div class="report-box__indicator bg-success tooltip cursor-pointer"--}}
{{--                                                 title="22% Higher than last month">--}}
{{--                                                22% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">{{$countUsers}}</div>
                                    <div class="text-base text-slate-500 mt-1">{{ __('main.unique_visitors') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->
            </div>
        </div>
    </div>
@endsection
