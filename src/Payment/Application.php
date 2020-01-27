<?php

namespace Godforheart\Easyalipay\Payment;

use Godforheart\Easyalipay\Kernel\ServiceContainer;

/**
 * Class Application
 * @package Godforheart\Easyalipay\Payment
 *
 * @property \Godforheart\Easyalipay\Payment\Trade\Client $trade
 * @property \Godforheart\Easyalipay\Payment\Refund\Client $refund
 * @property \Godforheart\Easyalipay\Payment\Close\Client $close
 * @property \Godforheart\Easyalipay\Payment\Sync\Client $sync
 * @property \Godforheart\Easyalipay\Payment\Pay\Client $pay
 */
class Application extends ServiceContainer
{
    protected $providers = [
        Close\ServiceProvider::class,
        Pay\ServiceProvider::class,
        Refund\ServiceProvider::class,
        Sync\ServiceProvider::class,
        Trade\ServiceProvider::class,
    ];

    public function setAppAuthToken(string $appAuthToken)
    {
        $this['config']->set('app_auth_token', $appAuthToken);

        return $this;
    }
}