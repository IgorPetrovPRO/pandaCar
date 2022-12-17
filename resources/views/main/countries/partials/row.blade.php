<tr class="intro-x">
    <td>
        <p class="font-medium whitespace-nowrap">{{ $country->name }}</p>
    </td>
    <td>
        {{ $country->position }}
    </td>
    <td class="table-report__action w-56">
        <div class="flex justify-center items-center">
            <a class="flex items-center mr-3" href="{{route('countries.edit', $country->id)}}">
                <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> {{ __('common.btn_edit') }}
            </a>
            <x-form-delete>
                {{ __('common.btn_delete') }}

                <x-slot:id>
                    {{$country->id}}
                </x-slot:id>
                <x-slot:action>
                    {{route('countries.destroy',$country->id)}}
                </x-slot:action>
                <x-slot:textNotification>
                    {!!   __('common.delete_action', ['name' => $country->name]) !!}
                </x-slot:textNotification>
            </x-form-delete>
        </div>
    </td>
</tr>
