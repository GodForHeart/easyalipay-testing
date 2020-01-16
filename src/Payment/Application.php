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
 */
class Application extends ServiceContainer
{
    protected $providers = [
        Trade\ServiceProvider::class,
        Refund\ServiceProvider::class,
        Close\ServiceProvider::class,
        Sync\ServiceProvider::class,
    ];

    public function setAppAuthToken(string $appAuthToken)
    {
        $this['config']->set('app_auth_token', $appAuthToken);

        return $this;
    }
}