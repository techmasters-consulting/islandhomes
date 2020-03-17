@extends('core/base::layouts.master')
@section('content')
    @php do_action(BASE_ACTION_TOP_FORM_CONTENT_NOTIFICATION, request(), $payment) @endphp
    <div class="row">
        <div class="col-md-9">
            <div class="widget meta-boxes">
                <div class="widget-title">
                    <h4>
                        <span>{{ trans('plugins/payment::payment.information') }}</span>
                    </h4>
                </div>
                <div class="widget-body">
                    <p>{{ __('Created At') }}: <strong>{{ $payment->created_at }}</strong></p>
                    <p>{{ __('Payment Channel') }}: <strong>{{ $payment->payment_channel->label() }}</strong></p>
                    <p>{{ __('Total') }}: <strong>{{ $payment->amount }} {{ $payment->currency }}</strong></p>
                    {!! $detail !!}
                </div>
            </div>
            @php do_action(BASE_ACTION_META_BOXES, 'advanced', $payment) @endphp
        </div>
        <div class="col-md-3 right-sidebar">
            <div class="widget meta-boxes form-actions form-actions-default action-horizontal">
                <div class="widget-title">
                    <h4>
                        <span>{{ trans('plugins/payment::payment.action') }}</span>
                    </h4>
                </div>
                <div class="widget-body">
                    <div class="btn-set">
                        <a href="{{ route('payment.index') }}" class="btn btn-success">
                            <i class="fa fa-check-circle"></i> {{ trans('plugins/payment::payment.go_back') }}
                        </a>
                    </div>
                </div>
            </div>
            @php do_action(BASE_ACTION_META_BOXES, 'side', $payment) @endphp
        </div>
    </div>
@stop
