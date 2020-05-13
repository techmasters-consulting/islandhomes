<?php

namespace Botble\Payment\Providers;

use Assets;
use Botble\Base\Supports\Helper;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\Payment\Models\Payment;
use Botble\Payment\Services\Gateways\PayPal\PayPalPaymentService;
use Botble\Payment\Services\Gateways\Stripe\StripePaymentService;
use Event;
use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Support\ServiceProvider;
use Botble\Payment\Repositories\Caches\PaymentCacheDecorator;
use Botble\Payment\Repositories\Eloquent\PaymentRepository;
use Botble\Payment\Repositories\Interfaces\PaymentInterface;

class PaymentServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->singleton(PaymentInterface::class, function () {
            return new PaymentCacheDecorator(new PaymentRepository(new Payment));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/payment')
            ->loadAndPublishConfigurations(['payment', 'permissions'])
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web'])
            ->loadMigrations()
            ->publishAssets();

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()
                ->registerItem([
                    'id'          => 'cms-plugins-payments',
                    'priority'    => 800,
                    'parent_id'   => null,
                    'name'        => 'plugins/payment::payment.name',
                    'icon'        => 'fas fa-credit-card',
                    'url'         => route('payment.index'),
                    'permissions' => ['payment.index'],
                ])
                ->registerItem([
                    'id'          => 'cms-plugins-payments-all',
                    'priority'    => 0,
                    'parent_id'   => 'cms-plugins-payments',
                    'name'        => __('Transactions'),
                    'icon'        => null,
                    'url'         => route('payment.index'),
                    'permissions' => ['payment.index'],
                ])
                ->registerItem([
                    'id'          => 'cms-plugins-payment-methods',
                    'priority'    => 1,
                    'parent_id'   => 'cms-plugins-payments',
                    'name'        => 'plugins/payment::payment.payment_methods',
                    'icon'        => null,
                    'url'         => route('payments.methods'),
                    'permissions' => ['payments.methods'],
                ]);
        });

        add_shortcode('payment-form', 'Payment form', 'Payment form', function ($shortCode) {
            $data = [
                'name'      => $shortCode->name,
                'currency'  => $shortCode->currency,
                'amount'    => $shortCode->amount,
                'returnUrl' => $shortCode->return_url,
            ];

            return view('plugins/payment::partials.form', $data);
        });

        add_shortcode('payment-info', 'Payment info', 'Payment info', function ($shortCode) {
            $payment = app(PaymentInterface::class)->getFirstBy(['charge_id' => $shortCode->charge_id]);

            $detail = null;
            switch ($payment->payment_channel) {
                case 'paypal':
                    $paymentDetail = (new PayPalPaymentService)->getPaymentDetails($payment->charge_id);
                    $detail = view('plugins/payment::paypal.detail', ['payment' => $paymentDetail])->render();
                    break;
                case 'stripe':
                    $paymentDetail = (new StripePaymentService)->getPaymentDetails($payment->charge_id);
                    $detail = view('plugins/payment::stripe.detail', ['payment' => $paymentDetail])->render();
                    break;

            }

            return view('plugins/payment::partials.info', compact('payment', 'detail'));
        });

    }
}
