<?php

namespace Godforheart\Easyalipay\Payment\Refund;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * @inheritDoc
     */
    public function register(Container $pimple)
    {
        $pimple['refund'] = function($pimple){
            return new Client($pimple);
        };
    }
}