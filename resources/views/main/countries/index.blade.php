@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ __('countries.title') }}</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">{{ __('countries.h1') }}</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{route('countries.create')}}" class="btn btn-primary shadow-md mr-2">{{ __('countries.add') }}</a>
            <div class="hidden md:block mx-auto text-slate-500">
                {{$countries->links('layout.components.pages.text')}}
            </div>

            <form method="get" action="{{route('countries.index')}}">
                <div class="flex">
                    <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <div class="w-56 relative text-slate-500">
                            <input type="text" name="text" class="form-control w-56 box pr-10"
                                   placeholder="{{ __('countries.search') }}" value="{{request()->text}}"
                                   onchange="this.form.submit()">
                            <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                        </div>
                    </div>

                    <select name="per_page" class="ml-1 w-20 form-select box mt-3 sm:mt-0"
                            onchange="this.form.submit()">
                        <option value="10" @if(request()->per_page == 10 || request()->per_page == '') selected @endif>
                            10
                        </option>
                        <option value="25" @if(request()->per_page == 25) selected @endif>25</option>
                        <option value="35" @if(request()->per_page == 35) selected @endif>35</option>
                        <option value="50" @if(request()->per_page == 50) selected @endif>50</option>
                    </select>

                </div>

            </form>
        </div>
        <!-- BEGIN: Data List -->
        @if($countries->total() > 0)
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                @if(request()->text)
                    <p>{!!  __('common.search_text', ['text' => request()->text]) !!}</p>
                @endif
                <table class="table table-report -mt-2">
                    <thead>
                    <tr>
                        <th class="whitespace-nowrap">{{ __('countries.table_th_name') }}</th>
                        <th class="whitespace-nowrap">{{ __('countries.table_th_position') }}</th>
                        <th class="text-center whitespace-nowrap">{{ __('countries.table_th_action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @each('main.countries.partials.row' , $countries ,'country')
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
            <!-- BEGIN: Pagination -->
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
                {{$countries->links('layout.components.pages.links')}}
            </div>
            <!-- END: Pagination -->
        @else
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                {!!   __('common.search_not_found', ['text' => request()->text]) !!}
            </div>
        @endif

    </div>

@endsection
