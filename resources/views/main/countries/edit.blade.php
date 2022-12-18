@extends('../layout/' . $layout)

@section('subhead')
    <title>Добавление новой страны</title>
@endsection

@section('subcontent')

    <div class="grid grid-cols-11 gap-x-6 mt-5 pb-20">

        <form class="intro-y col-span-11 2xl:col-span-9" method="POST" action="{{route('countries.update',$country->id)}}">
            @csrf
            @method('PUT')
            <!-- BEGIN: Product Information -->
            <div class="intro-y box p-5 mt-5">
                <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                    <div class="mt-5">
                        <x-input required="1" placeholder="Укажите название страны" value="{{old('name',$country->name)}}" name="name">
                            Название
                        </x-input>
                        <x-input placeholder="Укажите название категории" value="{{old('position',$country->position)}}" name="position">
                            Позиция вывода
                        </x-input>


                        <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label xl:w-64 xl:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center">
                                        <div class="font-medium">Категории</div>
                                    </div>
                                    <div class="leading-relaxed text-slate-500 text-xs mt-3">Вы можете выбрать какие виды транспорта можно рассчитать</div>
                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">

                                <select id="category" name="category[]" data-placeholder="Категории" class="tom-select w-full tomselected" multiple="multiple" tabindex="-1" hidden="hidden">

                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if( Str::contains($country->category, $category->id) ) selected @endif >{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Product Detail -->

            <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                <a href="{{route('countries.index')}}"
                        class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">
                    Отменить
                </a>
                <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Сохранить</button>
            </div>
        </form>
    </div>

{{--Список стран--}}
    <h2 class="intro-y text-lg font-medium mt-10">{{ __('cities.h1') }}</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{route('cities.create')}}?country={{$country->id}}" class="btn btn-primary shadow-md mr-2">{{ __('cities.add') }}</a>
            <div class="hidden md:block mx-auto text-slate-500">
                {{$cities->links('layout.components.pages.text')}}
            </div>

            <form method="get" action="{{route('countries.edit', $country->id)}}">
                <div class="flex">
                    <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <div class="w-56 relative text-slate-500">
                            <input type="text" name="text" class="form-control w-56 box pr-10"
                                   placeholder="{{ __('cities.search') }}" value="{{request()->text}}"
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
        @if($cities->total() > 0)
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                @if(request()->text)
                    <p>{!!  __('common.search_text', ['text' => request()->text]) !!}</p>
                @endif
                <table class="table table-report -mt-2">
                    <thead>
                    <tr>
                        <th class="whitespace-nowrap">{{ __('cities.table_th_name') }}</th>
                        <th class="text-center whitespace-nowrap">{{ __('cities.table_th_position') }}</th>
                        <th class="text-center whitespace-nowrap">{{ __('cities.table_th_additional_cost') }}</th>
                        <th class="text-center whitespace-nowrap">{{ __('cities.table_th_action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @each('main.cities.partials.row' , $cities ,'city')
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
            <!-- BEGIN: Pagination -->
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
                {{$cities->links('layout.components.pages.links')}}
            </div>
            <!-- END: Pagination -->
        @else
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                {!!   __('common.search_not_found', ['text' => request()->text]) !!}
            </div>
        @endif

    </div>


{{--    Настройки параметров--}}
    <h2 class="intro-y text-lg font-medium mt-10">Параметры калькуляторов</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Data List -->
                    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead>
                    <tr>
                        <th class="whitespace-nowrap">{{ __('cities.table_th_name') }}</th>
                        <th class="text-center whitespace-nowrap">{{ __('cities.table_th_action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr class="intro-x">
                            <td>
                                <p class="font-medium whitespace-nowrap">{{ $category->name }}</p>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="{{ route('calc', [$country->id, $category->id]) }}">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> {{ __('common.btn_edit') }}
                                    </a>
                                </div>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
    </div>

@endsection

@section('script')
    @vite('resources/js/ckeditor-classic.js')
@endsection
