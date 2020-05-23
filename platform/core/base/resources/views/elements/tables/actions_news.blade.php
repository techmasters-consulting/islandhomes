<div class="table-actions">
    {!! $extra !!}

    @if (!empty($delete))
        @if (Auth::user()->hasPermission($delete))
            <a href="#" class="btn btn-icon btn-sm btn-danger deleteDialog" data-toggle="tooltip" data-section="{{ route($delete, $item->id) }}" role="button" data-original-title="{{ trans('core/base::tables.delete_entry') }}" >
                <i class="fa fa-trash"></i>
            </a>
        @endif
    @endif
</div>
