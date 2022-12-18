@extends('../layout/' . $layout)

@section('subhead')
    <title>Редактировать новый отзыв</title>
@endsection

@section('subcontent')

    <div class="grid grid-cols-11 gap-x-6 mt-5 pb-20">

        <form class="intro-y col-span-11 2xl:col-span-9" method="POST" action="{{route('properties.update', $property->id)}}">
            @csrf
            @method('PUT')
            <!-- BEGIN: Product Information -->
            <div class="intro-y box p-5 mt-5">
                <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                    <div class="mt-5">
                        <x-input required="1" placeholder="Укажите название" value="{{old('name', $property->name)}}" name="name">
                            Название
                        </x-input>
                        <x-input placeholder="Укажите ключ" value="{{old('key', $property->key)}}" name="hidden">
                            Ключ
                        </x-input>
                        <select class="form-select mt-2 sm:mr-2" name="type" aria-label="Тип параметра">
                            <option value="1" @if($property->type == 1) selected @endif>Просто число</option>
                            <option value="2" @if($property->type == 2) selected @endif>Процент от стоимости</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- END: Product Detail -->

            <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                <a href="{{route('properties.index')}}"
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
