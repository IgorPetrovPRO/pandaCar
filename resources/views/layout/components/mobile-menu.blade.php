<!-- BEGIN: Mobile Menu -->
<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('build/assets/images/logo.svg') }}">
        </a>
        <a href="javascript:;" class="mobile-menu-toggler">
            <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i>
        </a>
    </div>
    <div class="scrollable">
        <a href="javascript:;" class="mobile-menu-toggler">
            <i data-lucide="x-circle" class="w-8 h-8 text-white transform -rotate-90"></i>
        </a>
        <ul class="scrollable__content py-2">
            @foreach($menuSide->all() as $item)
                @if ($item->label() == 'devider')
                    <li class="menu__devider my-6"></li>
                @else
                    <li>
                        <a href="{{ $item->link()  != '-'  ? $item->link() : 'javascript:;' }}"
                           class="@if($item->isActive() OR $item->childActive()) menu menu--active @else menu @endif">
                            <div class="menu__icon">
                                <i data-lucide="{{ $item->icon() }}"></i>
                            </div>
                            <div class="menu__title">
                                {{ $item->label() }}
                                @if ($item->subMenu())
                                    <div
                                        class="menu__sub-icon @if($item->childActive()) transform rotate-180 @endif">
                                        <i data-lucide="chevron-down"></i>
                                    </div>
                                @endif
                            </div>
                        </a>
                        @if ($item->subMenu())
                            <ul class=" @if($item->childActive()) menu__sub-open @endif">
                                @foreach ($item->subMenu()->all() as $subMenu)
                                    <li>
                                        <a href="{{ $subMenu->link()  != '-'  ? $subMenu->link() : 'javascript:;' }}"
                                           class="@if($subMenu->isActive()) menu menu--active @else menu @endif">
                                            <div class="menu__icon">
                                                <i data-lucide="{{ $subMenu->icon() }}"></i>
                                            </div>
                                            <div class="menu__title">
                                                {{ $subMenu->label() }}
                                                @if ($subMenu->subMenu())
                                                    <div
                                                        class="menu__sub-icon @if($subMenu->childActive()) transform rotate-180 @endif">
                                                        <i data-lucide="chevron-down"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </a>
                                        @if ($subMenu->subMenu())
                                            <ul class="@if($subMenu->childActive()) menu__sub-open @endif">
                                                @foreach ($subMenu->subMenu() as $sunMenuLevel2)
                                                    <li>
                                                        <a href="{{ $sunMenuLevel2->link()  != '-'  ? $sunMenuLevel2->link() : 'javascript:;' }}"
                                                           class="@if($sunMenuLevel2->isActive()) menu menu--active @else menu @endif">
                                                            <div class="menu__icon">
                                                                <i data-lucide="{{$sunMenuLevel2->icon()}}"></i>
                                                            </div>
                                                            <div class="menu__title">{{ $sunMenuLevel2->label() }}</div>
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
    </div>
</div>
<!-- END: Mobile Menu -->
