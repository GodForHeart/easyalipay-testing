<?php

namespace Godforheart\Easyalipay\Payment\Pay;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * @inheritDoc
     */
    public function register(Container $pimple)
    {
        $pimple['pay'] = function($pimple){
            return new Client($pimple);
        };
    }
}