<a class="flex items-center text-danger" href="javascript:;"
   data-tw-toggle="modal"
   data-tw-target="#delete-confirmation-modal{{$id}}">
    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> {{$slot}}
</a>
<!-- BEGIN: Delete Confirmation Modal -->
<div id="delete-confirmation-modal{{$id}}" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Вы уверены?</div>
                    <div class="text-slate-500 mt-2">
                        {{$textNotification}}
                    </div>
                </div>

                <form action="{{$action}}" class="px-5 pb-8 text-center" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">
                        Отменить
                    </button>
                    <button type="submit" class="btn btn-danger w-24">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END: Delete Confirmation Modal -->
