<tr class="intro-x">
    <td>
        <a href="" class="font-medium whitespace-nowrap">{{ $faq->name }}</a>
    </td>
    <td class="text-center">{{$faq->position}}</td>

    <td class="table-report__action w-56">
        <div class="flex justify-center items-center">
            <a class="flex items-center mr-3" href="{{route('faq-categories.edit', $faq->id)}}">
                <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> {{ __('common.btn_edit') }}
            </a>
            <x-form-delete>
                {{ __('common.btn_delete') }}

                <x-slot:id>
                    {{$faq->id}}
                </x-slot:id>
                <x-slot:action>
                    {{route('faq-categories.destroy',$faq->id)}}
                </x-slot:action>
                <x-slot:textNotification>
                    {!!   __('common.delete_action', ['name' => $faq->name]) !!}
                </x-slot:textNotification>
            </x-form-delete>
        </div>
    </td>
</tr>
