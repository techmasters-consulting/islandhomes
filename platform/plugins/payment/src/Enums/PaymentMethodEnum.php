<?php

namespace Botble\Payment\Enums;

use Botble\Base\Supports\Enum;

/**
 * @method static PaymentMethodEnum PAYPAL()
 * @method static PaymentMethodEnum STRIPE()
 * @method static PaymentMethodEnum DIRECT()
 */
class PaymentMethodEnum extends Enum
{
    public const PAYPAL = 'paypal';
    public const STRIPE = 'stripe';
    public const DIRECT = 'direct';

    /**
     * @var string
     */
    public static $langPath = 'plugins/payment::payment.methods';
}
