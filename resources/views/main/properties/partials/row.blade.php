<tr class="intro-x">
    <td>
        <p class="font-medium whitespace-nowrap">{{ $property->name }}</p>
    </td>
    <td class="text-center">
        @if($property->type == 1)
            Просто число
        @else
            Процент от суммы
        @endif
    </td>
    <td class="table-report__action w-56">
        <div class="flex justify-center items-center">
            <a class="flex items-center mr-3" href="{{ route('properties.edit', $property->id) }}">
                <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> {{ __('common.btn_edit') }}
            </a>
            <x-form-delete>
                {{ __('common.btn_delete') }}

                <x-slot:id>
                    {{$property->id}}
                </x-slot:id>
                <x-slot:action>
                    {{route('properties.destroy',$property->id)}}
                </x-slot:action>
                <x-slot:textNotification>
                    {!!   __('common.delete_action', ['name' => $property->name]) !!}
                </x-slot:textNotification>
            </x-form-delete>
        </div>
    </td>
</tr>
