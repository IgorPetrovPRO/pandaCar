@extends('../layout/main')

@section('head')
    @yield('subhead')
@endsection

@section('content')
    @include('../layout/components/mobile-menu')
    <div class="flex mt-[4.7rem] md:mt-0">
        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
            <a href="" class="intro-x flex items-center pl-5 pt-4">
                <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('build/assets/images/logo.svg') }}">
                <span class="hidden xl:block text-white text-lg ml-3">
                    {{ env('APP_NAME') }}
                </span>
            </a>
            <div class="side-nav__devider my-6"></div>
            <ul>
                @foreach($menuSide->all() as $item)
                    @if ($item->label() == 'devider')
                        <li class="side-nav__devider my-6"></li>
                    @else
                        <li>
                            <a href="{{ $item->link() != '-' ? $item->link() : 'javascript:;' }}"
                               class="@if($item->isActive() OR $item->childActive()) side-menu side-menu--active @else side-menu @endif">
                                <div class="side-menu__icon">
                                    <i data-lucide="{{ $item->icon() }}"></i>
                                </div>
                                <div class="side-menu__title">
                                    {{ $item->label() }}
                                    @if ($item->subMenu())
                                        <div
                                            class="side-menu__sub-icon @if($item->childActive()) transform rotate-180 @endif">
                                            <i data-lucide="chevron-down"></i>
                                        </div>
                                    @endif
                                </div>
                            </a>
                            @if ($item->subMenu())
                                <ul class=" @if($item->childActive()) side-menu__sub-open @endif">
                                    @foreach ($item->subMenu()->all() as $subMenu)
                                        <li>
                                            <a href="{{ $subMenu->link()  != '-'  ? $subMenu->link() : 'javascript:;' }}"
                                               class="@if($subMenu->isActive()) side-menu side-menu--active @else side-menu @endif">
                                                <div class="side-menu__icon">
                                                    <i data-lucide="{{ $subMenu->icon() }}"></i>
                                                </div>
                                                <div class="side-menu__title">
                                                    {{ $subMenu->label() }}
                                                    @if ($subMenu->subMenu())
                                                        <div
                                                            class="side-menu__sub-icon @if($subMenu->childActive()) transform rotate-180 @endif">
                                                            <i data-lucide="chevron-down"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                            </a>
                                            @if ($subMenu->subMenu())
                                                <ul class="@if($subMenu->childActive()) side-menu__sub-open @endif">
                                                    @foreach ($subMenu->subMenu() as $sunMenuLevel2)
                                                        <li>
                                                            <a href="{{ $sunMenuLevel2->link()  != '-'  ? $sunMenuLevel2->link() : 'javascript:;' }}"
                                                               class="@if($sunMenuLevel2->isActive()) side-menu side-menu--active @else side-menu @endif">
                                                                <div class="side-menu__icon">
                                                                    <i data-lucide="{{$sunMenuLevel2->icon()}}"></i>
                                                                </div>
                                                                <div class="side-menu__title">{{ $sunMenuLevel2->label() }}</div>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endif
                @endforeach
            </ul>
            <div class="side-nav__devider my-6"></div>
            <a class="flex items-center pl-5 pt-4 created-by" href="{{env('AUTHOR_SITE')}}"
               target="_blank">
                Разработка ipetrov.pro
            </a>
        </nav>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            @include('../layout/components/top-bar')
            @yield('subcontent')
        </div>
        <!-- END: Content -->
    </div>
@endsection
