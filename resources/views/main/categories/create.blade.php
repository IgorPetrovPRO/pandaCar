@extends('../layout/' . $layout)

@section('subhead')
    <title>Редактировать новый отзыв</title>
@endsection

@section('subcontent')

    <div class="grid grid-cols-11 gap-x-6 mt-5 pb-20">

        <form class="intro-y col-span-11 2xl:col-span-9" method="POST" action="{{route('categories.store')}}">
            @csrf
            <!-- BEGIN: Product Information -->
            <div class="intro-y box p-5 mt-5">
                <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                    <div class="mt-5">
                        <x-input required="1" placeholder="Укажите название" value="{{old('name')}}" name="name">
                            Название
                        </x-input>

                        <x-input placeholder="Позиция" value="{{old('position', $last_position)}}" name="position">
                            Город автора
                        </x-input>
                    </div>
                </div>
            </div>
            <!-- END: Product Detail -->

            <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                <a href="{{route('categories.index')}}"
                   class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">
                    Отменить
                </a>
                <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Сохранить</button>
            </div>
        </form>

    </div>
@endsection

@section('script')
    @vite('resources/js/ckeditor-classic.js')
@endsection
