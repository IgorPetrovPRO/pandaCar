@extends('../layout/' . $layout)

@section('subhead')
    <title>Редактирование вопроса</title>
@endsection

@section('subcontent')

    <div class="grid grid-cols-11 gap-x-6 mt-5 pb-20">

        <form class="intro-y col-span-11 2xl:col-span-9" method="POST" action="{{route('faqs.update',$faq->id)}}">
            @csrf
            @method('PUT')
            <!-- BEGIN: Product Information -->
            <div class="intro-y box p-5 mt-5">
                <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                    <div class="mt-5">
                        <x-input value="{{$faq->faq_category_id}}" name="faq_category_id" type="hidden"> </x-input>
                        <x-input required="1" placeholder="Укажите вопрос" value="{{old('question',$faq->question)}}" name="question">
                            Вопрос
                        </x-input>
                        <x-input required="1" placeholder="Напишите ответ на вопрос" value="{!!  old('answer',$faq->answer)!!}" type="textarea" name="answer">
                            Ответ
                        </x-input>
                        <x-input placeholder="Укажите название категории" value="{{old('position', $faq->position)}}" name="position">
                            Позиция вывода
                        </x-input>
                    </div>
                </div>
            </div>
            <!-- END: Product Detail -->

            <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                <a href="{{route('faq-categories.edit', $faq->faq_category_id)}}"
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
