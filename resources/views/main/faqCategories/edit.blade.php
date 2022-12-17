@extends('../layout/' . $layout)

@section('subhead')
    <title>Редактирование категории</title>
@endsection

@section('subcontent')

    <div class="grid grid-cols-11 gap-x-6 mt-5 pb-20">

        <form class="intro-y col-span-11 2xl:col-span-9" method="POST" action="{{route('faq-categories.update',$faqCategory->id)}}">
            @csrf
            @method('PUT')
            <!-- BEGIN: Product Information -->
            <div class="intro-y box p-5 mt-5">
                <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                    <div class="mt-5">
                        <x-input required="1" placeholder="Укажите название страны" value="{{old('name',$faqCategory->name)}}" name="name">
                            Название
                        </x-input>
                        <x-input placeholder="Укажите название категории" value="{{old('position',$faqCategory->position)}}" name="position">
                            Позиция вывода
                        </x-input>
                    </div>
                </div>
            </div>
            <!-- END: Product Detail -->

            <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                <a href="{{route('faq-categories.index')}}"
                        class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">
                    Отменить
                </a>
                <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Сохранить</button>
            </div>
        </form>
    </div>

{{--Список стран--}}
    <h2 class="intro-y text-lg font-medium mt-10">{{ __('faqs.h1') }}</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{route('faqs.create')}}?category={{$faqCategory->id}}" class="btn btn-primary shadow-md mr-2">{{ __('faqs.add') }}</a>
            <div class="hidden md:block mx-auto text-slate-500">
                {{$faqs->links('layout.components.pages.text')}}
            </div>

            <form method="get" action="{{route('faq-categories.edit', $faqCategory->id)}}">
                <div class="flex">
                    <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <div class="w-56 relative text-slate-500">
                            <input type="text" name="text" class="form-control w-56 box pr-10"
                                   placeholder="{{ __('faqs.search') }}" value="{{request()->text}}"
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
        @if($faqs->total() > 0)
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                @if(request()->text)
                    <p>{!!  __('common.search_text', ['text' => request()->text]) !!}</p>
                @endif
                <table class="table table-report -mt-2">
                    <thead>
                    <tr>
                        <th class="whitespace-nowrap">{{ __('faqs.table_th_name') }}</th>
                        <th class="whitespace-nowrap">{{ __('faqs.table_th_position') }}</th>
                        <th class="text-center whitespace-nowrap">{{ __('faqs.table_th_action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @each('main.faqs.partials.row' , $faqs ,'faq')
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
            <!-- BEGIN: Pagination -->
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
                {{$faqs->links('layout.components.pages.links')}}
            </div>
            <!-- END: Pagination -->
        @else
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                {!!   __('common.search_not_found', ['text' => request()->text]) !!}
            </div>
        @endif

    </div>
@endsection

@section('script')
    @vite('resources/js/ckeditor-classic.js')
@endsection
