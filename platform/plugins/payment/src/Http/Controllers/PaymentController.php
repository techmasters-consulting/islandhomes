<?php

namespace Botble\Payment\Http\Controllers;

use Assets;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Payment\Enums\PaymentMethodEnum;
use Botble\Payment\Http\Requests\PaymentMethodRequest;
use Botble\Payment\Repositories\Interfaces\PaymentInterface;
use Botble\Payment\Services\Gateways\PayPal\PayPalPaymentService;
use Botble\Payment\Services\Gateways\Stripe\StripePaymentService;
use Botble\Payment\Tables\PaymentTable;
use Botble\Setting\Supports\SettingStore;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Throwable;

class PaymentController extends Controller
{
    /**
     * @var PayPalPaymentService
     */
    protected $payPalService;

    /**
     * @var StripePaymentService
     */
    protected $stripePaymentService;

    /**
     * @var string
     */
    protected $returnUrl;

    /**
     * @var PaymentInterface
     */
    protected $paymentRepository;

    /**
     * PaymentController constructor.
     * @param PayPalPaymentService $payPalService
     * @param StripePaymentService $stripePaymentService
     * @param PaymentInterface $paymentRepository
     */
    public function __construct(
        PayPalPaymentService $payPalService,
        StripePaymentService $stripePaymentService,
        PaymentInterface $paymentRepository
    ) {
        $this->payPalService = $payPalService;

        $this->stripePaymentService = $stripePaymentService;
        $this->paymentRepository = $paymentRepository;

        $this->returnUrl = config('plugins.payment.payment.return_url_after_payment');
    }

    /**
     * @param PaymentTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(PaymentTable $table)
    {
        page_title()->setTitle(trans('plugins/payment::payment.name'));

        return $table->renderTable();
    }


    /**
     * @param $id
     * @param Request $request
     * @return BaseHttpResponse
     */
    public function destroy(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $payment = $this->paymentRepository->findOrFail($id);

            $this->paymentRepository->delete($payment);

            event(new DeletedContentEvent(PAYMENT_MODULE_SCREEN_NAME, $request, $payment));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.cannot_delete'));
        }
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws Exception
     */
    public function deletes(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $payment = $this->paymentRepository->findOrFail($id);
            $this->paymentRepository->delete($payment);
            event(new DeletedContentEvent(PAYMENT_MODULE_SCREEN_NAME, $request, $payment));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function postCheckout(Request $request)
    {
        $error = false;
        $errorMessage = null;

        $currency = $request->input('currency', config('plugins.payment.payment.currency'));
        $currency = strtoupper($currency);

        $data = [
            'amount'   => $request->input('amount'),
            'currency' => $currency,
            'type'     => $request->input('payment_method'),
        ];

        switch ($request->input('payment_method')) {
            case PaymentMethodEnum::STRIPE:
                $result = $this->stripePaymentService
                    ->execute($request);
                if (!$result) {
                    $error = true;
                    $errorMessage = $this->stripePaymentService->getErrorMessage();
                }

                $data['paymentId'] = $result;
                break;
            case PaymentMethodEnum::PAYPAL:
                $checkoutUrl = $this->payPalService->execute($request);
                if ($checkoutUrl) {
                    return redirect($checkoutUrl);
                } else {
                    $error = true;
                    $errorMessage = $this->payPalService->getErrorMessage();
                }
                break;
            default:
                break;
        }

        $returnUrl = $request->input('return_url') . '?' . http_build_query($data);

        if ($error) {
            return redirect()->back()->with('error_msg', $errorMessage);
        }

        return redirect()->to($returnUrl)->with('success_msg', trans('plugins/payment::payment.checkout_success'));
    }

    /**
     * Show edit form
     *
     * @param int id
     * @return Factory|View
     * @throws Exception
     * @throws Throwable
     */
    public function show($id)
    {
        $payment = $this->paymentRepository->findOrFail($id);

        $detail = null;
        switch ($payment->payment_channel) {
            case 'paypal':
                $paymentDetail = $this->payPalService->getPaymentDetails($payment->charge_id);
                $detail = view('plugins/payment::paypal.detail', ['payment' => $paymentDetail])->render();
                break;
            case 'stripe':
                $paymentDetail = $this->stripePaymentService->getPaymentDetails($payment->charge_id);
                $detail = view('plugins/payment::stripe.detail', ['payment' => $paymentDetail])->render();
                break;

        }
        return view('plugins/payment::show', compact('payment', 'detail'));
    }

    /**
     * @return Factory|View
     */
    public function methods()
    {
        page_title()->setTitle(trans('plugins/payment::payment.payment_methods'));

        Assets::addStylesDirectly('vendor/core/plugins/payment/css/payment-methods.css')
            ->addScriptsDirectly('vendor/core/plugins/payment/js/payment-methods.js');

        return view('plugins/payment::settings.index');
    }

    /**
     * @param PaymentMethodRequest $request
     * @param BaseHttpResponse $response
     * @param SettingStore $settingStore
     * @return BaseHttpResponse
     */
    public function updateMethods(PaymentMethodRequest $request, BaseHttpResponse $response, SettingStore $settingStore)
    {
        $type = $request->input('type');
        $data = $request->except(['_token', 'type']);
        foreach ($data as $settingKey => $settingValue) {
            $settingStore
                ->set($settingKey, $settingValue);
        }

        $settingStore
            ->set('payment_' . $type . '_status', 1)
            ->save();

        return $response->setMessage(__('Saved payment method successfully!'));
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @param SettingStore $settingStore
     * @return BaseHttpResponse
     */
    public function updateMethodStatus(Request $request, BaseHttpResponse $response, SettingStore $settingStore)
    {
        $settingStore
            ->set('payment_' . $request->input('type') . '_status', 0)
            ->save();

        return $response->setMessage(__('Turn off payment method successfully!'));
    }
}
