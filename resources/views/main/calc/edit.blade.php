@extends('../layout/' . $layout)

@section('subhead')
    <title>Настройка параметров калькулятора</title>
@endsection

@section('subcontent')

    <div class="grid grid-cols-11 gap-x-6 mt-5 pb-20">

        <form class="intro-y col-span-11 2xl:col-span-9" method="POST" action="{{route('calc.update',[$country->id,$category->id])}}">
            @csrf
            <!-- BEGIN: Product Information -->
            <div class="intro-y box p-5 mt-5">
                <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                    Настройки параметров для {{$category->name}} в {{$country->name}}
                </div>
                <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                    <div class="mt-5">
                        @foreach($properties as $property)
                            @if(Arr::exists($calc, $property->key? : 'property_'.$property->id))
                                <x-input placeholder="Укажите параметр"
                                     value="{{$calc[$property->key? : 'property_'.$property->id] ? : 0}}"
                                     name="{{$property->key? : 'property_'.$property->id}}">
                                    {{$property->name}} <br/>
                                    <small>@if($property->type == 1) (просто число в $) @else Процент, например 0.25 = 25% @endif</small>
                                </x-input>

                            @else
                                <x-input placeholder="Укажите параметр"
                                     value="0"
                                     name="{{$property->key? : 'property_'.$property->id}}">
                                    {{$property->name}} <br/>
                                    <small>@if($property->type == 1) (просто число в $) @else Процент, например 0.25 = 25% @endif</small>
                                </x-input>
                            @endif

                        @endforeach

                    </div>
                </div>
            </div>
            <!-- END: Product Detail -->

            <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                <a href="{{route('countries.edit', $country->id)}}"
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
