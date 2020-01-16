<?php

namespace Godforheart\Easyalipay\Payment\Trade;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * @inheritDoc
     */
    public function register(Container $pimple)
    {
        $pimple['trade'] = function($pimple){
            return new Client($pimple);
        };
    }
}