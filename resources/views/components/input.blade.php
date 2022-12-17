@props([
    'required' => 0,
    'name' => 'title',
    'type' => 'text',
    'placeholder' => 'Название',
    'value' => '',
])
@if($type == 'hidden')
    <input id="{{$name}}" type="{{$type}}"
           class="@error($name) border-danger @enderror"
           name="{{$name}}"
           value="{{$value}}">
@else
    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
        <label class="form-label xl:w-64 xl:!mr-10" for="{{$name}}">
            <div class="text-left">
                <div class="flex items-center">
                    <div class="font-medium">{{$slot}}</div>
                    @if($required)
                        <div
                            class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                            Обязательно
                        </div>
                    @endif
                </div>
            </div>
        </label>
        <div class="w-full mt-3 xl:mt-0 flex-1">
            @if($type == 'textarea')
                <textarea id="{{$name}}" name="{{$name}}"
                       class="form-control @error($name) border-danger @enderror" rows="4" placeholder="{{$placeholder}}">{{$value}}</textarea>
            @else
                <input id="{{$name}}" type="{{$type}}"
                       class="form-control @error($name) border-danger @enderror"
                       name="{{$name}}"
                       placeholder="{{$placeholder}}"
                       value="{{$value}}">
            @endif

            @error($name)
            <div class="form-help text-danger">{{$message}}</div>
            @enderror
        </div>
    </div>
@endif
