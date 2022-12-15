@props([
    'required' => 0,
    'name' => 'title',
    'type' => 'text',
    'placeholder' => 'Название',
    'value' => '',
])

@if($type == 'hidden')
    <input id="{{$name}}" type="{{$type}}"
           class="form-control @error($name) border-danger @enderror"
           name="{{$name}}"
           placeholder="{{$placeholder}}"
           value="{{$value}}">
@else
    <div class="mb-3">
        <label for="{{$name}}" class="form-label">{{$slot}}</label>
        <input id="{{$name}}" type="{{$type}}"
               class="form-control @error($name) border-danger @enderror"
               name="{{$name}}"
               placeholder="{{$placeholder}}"
               value="{{$value}}">

        @error($name)
        <div class="form-help text-danger">{{$message}}</div>
        @enderror
    </div>
@endif

