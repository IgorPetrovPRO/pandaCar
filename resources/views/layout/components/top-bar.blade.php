<div class="top-bar">
    <!-- BEGIN: Breadcrumb -->
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">

    </nav>
    <!-- END: Breadcrumb -->

    <!-- END: Notifications -->
    <!-- BEGIN: Account Menu -->
    <div class="intro-x dropdown w-8 h-8">
        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button"
             aria-expanded="false" data-tw-toggle="dropdown">
            <img alt="" src="{{auth()->user()->getPhotoUrlAttribute()}}">
        </div>
        <div class="dropdown-menu w-56">
            <ul class="dropdown-content bg-primary text-white">
                <li class="p-2">
                    <div class="font-medium">{{auth()->user()->name}}</div>
                    <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500"></div>
                </li>
                <li>
                    <hr class="dropdown-divider border-white/[0.08]">
                </li>
                @foreach($menuProfile->all() as $item)
                    <li>
                        <a href="{{ $item->link() }}" class="dropdown-item hover:bg-white/5">
                            <i data-lucide="{{$item->icon()}}" class="w-4 h-4 mr-2"></i> {{$item->label()}}
                        </a>
                    </li>
                @endforeach

                <li>
                    <hr class="dropdown-divider border-white/[0.08]">
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="dropdown-item hover:bg-white/5">
                        <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> {{ __('common.logout') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Account Menu -->
</div>
<!-- END: Top Bar -->
