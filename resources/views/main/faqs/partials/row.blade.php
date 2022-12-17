<tr class="intro-x">
    <td>
        <a href="" class="font-medium whitespace-nowrap">{{ $faq->question }}</a>
        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
            -
        </div>
    </td>
    <td class="text-center">50</td>
    <td class="w-40">
        <div
            class="flex items-center justify-center {{-- $faker['true_false'][0] ? 'text-success' : 'text-danger' --}}">

        </div>
    </td>
    <td class="table-report__action w-56">
        <div class="flex justify-center items-center">
            <a class="flex items-center mr-3" href="{{ route('faqs.index') }}/{{$faq->id}}/edit">
                <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> {{ __('common.btn_edit') }}
            </a>
            <x-form-delete>
                {{ __('common.btn_delete') }}

                <x-slot:id>
                    {{$faq->id}}
                </x-slot:id>
                <x-slot:action>
                    {{route('faqs.destroy',$faq->id)}}
                </x-slot:action>
                <x-slot:textNotification>
                    {!!   __('common.delete_action', ['name' => $faq->question]) !!}
                </x-slot:textNotification>
            </x-form-delete>
        </div>
    </td>
</tr>
