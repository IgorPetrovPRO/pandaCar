@extends('../layout/' . $layout)

@section('subhead')
    <title>CRUD Form - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')

    <div class="grid grid-cols-11 gap-x-6 mt-5 pb-20">

        <form class="intro-y col-span-11 2xl:col-span-9" method="POST" action="{{route('faqs.store')}}">
            @csrf
            <!-- BEGIN: Product Information -->
            <div class="intro-y box p-5 mt-5">
                <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                    <div class="mt-5">
                        <x-input required="1" placeholder="Укажите название категории" value="">
                            Название категории
                        </x-input>
                        {{--                        <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">--}}
                        {{--                            <div class="form-label xl:w-64 xl:!mr-10">--}}
                        {{--                                <div class="text-left">--}}
                        {{--                                    <div class="flex items-center">--}}
                        {{--                                        <div class="font-medium">Родительная категория</div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="leading-relaxed text-slate-500 text-xs mt-3">--}}
                        {{--                                        Если вы создаете подкатегорию, укажите в какой категории она находится.--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="w-full mt-3 xl:mt-0 flex-1">--}}
                        {{--                                <select id="category" class="form-select">--}}
                        {{--                                    @foreach (array_slice($fakers, 0, 9) as $faker)--}}
                        {{--                                        <option--}}
                        {{--                                            value="{{ $faker['categories'][0]['name'] }}">{{ $faker['categories'][0]['name'] }}</option>--}}
                        {{--                                    @endforeach--}}
                        {{--                                </select>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Статус</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                    Если временно не нужно продавать товары - вы можете просто снять с публикации
                                    категорию
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <div class="flex flex-col sm:flex-row">
                                <div class="form-check mr-4">
                                    <input id="condition-new" class="form-check-input" type="radio" name="status"
                                           value="1">
                                    <label class="form-check-label" for="condition-new">Опубликована</label>
                                </div>
                                <div class="form-check mr-4 mt-2 sm:mt-0">
                                    <input id="condition-second" class="form-check-input" type="radio" name="status"
                                           value="0">
                                    <label class="form-check-label" for="condition-second">Снята с публикации</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Product Detail -->

            <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                <button type="button"
                        class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">
                    Отменить
                </button>
                <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Сохранить</button>
            </div>
        </form>
        <div class="intro-y col-span-2 hidden 2xl:block">
            <div class="pt-5 sticky top-0">
                <div
                    class="bg-warning/20 dark:bg-darkmode-600 border border-warning dark:border-0 rounded-md relative p-5">
                    <i data-lucide="lightbulb" class="w-12 h-12 text-warning/80 absolute top-0 right-0 mt-5 mr-3"></i>
                    <h2 class="text-lg font-medium">Tips</h2>
                    <div class="mt-5 font-medium">Price</div>
                    <div class="leading-relaxed text-xs mt-2 text-slate-600 dark:text-slate-500">
                        <div>The image format is .jpg .jpeg .png and a minimum size of 300 x 300 pixels (For optimal
                            images use a minimum size of 700 x 700 pixels).
                        </div>
                        <div class="mt-2">Select product photos or drag and drop up to 5 photos at once here. Include
                            min. 3 attractive photos to make the product more attractive to buyers.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @vite('resources/js/ckeditor-classic.js')
@endsection
