<tr class="intro-x">
    <td>
        <p class="font-medium whitespace-nowrap">{{ $city->name }}</p>
    </td>
    <td>
        {{ $city->position }}
    </td>
    <td>
        {{ $city->additional_cost }}
    </td>
    <td class="table-report__action w-56">
        <div class="flex justify-center items-center">
            <a class="flex items-center mr-3" href="{{ route('cities.index') }}/{{$city->id}}/edit">
                <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> {{ __('common.btn_edit') }}
            </a>
            <x-form-delete>
                {{ __('common.btn_delete') }}

                <x-slot:id>
                    {{$city->id}}
                </x-slot:id>
                <x-slot:action>
                    {{route('cities.destroy',$city->id)}}
                </x-slot:action>
                <x-slot:textNotification>
                    {!!   __('common.delete_action', ['name' => $city->name]) !!}
                </x-slot:textNotification>
            </x-form-delete>
        </div>
    </td>
</tr>
