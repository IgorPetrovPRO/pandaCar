@if ($paginator->hasPages())
    {{ __('common.result_show', [
        'from' => $paginator->firstItem(),
        'to' => $paginator->lastItem() ,
        'total' => $paginator->total()
    ]) }}
@endif
