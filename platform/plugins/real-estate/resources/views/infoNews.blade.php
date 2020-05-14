@if ($newsletters)
    <div class="row">
        <div class="col-md-6">
            <p><strong>{{ trans('plugins/real-estate::newsletters.time') }}</strong>: <i>{{ $newsletters->created_at }}</i></p>
            <p><strong>{{ trans('plugins/real-estate::newsletters.emails') }}</strong>: <i>{{ $newsletters->email }}</i></p>
            <p><strong>{{ trans('plugins/real-estate::newsletters.status') }}</strong>: <i>{{ $newsletters->status }}</i></p>
        </div>

    </div>
    @endif
