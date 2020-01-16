<?php

namespace Godforheart\Easyalipay\Payment\Close;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * @inheritDoc
     */
    public function register(Container $pimple)
    {
        $pimple['close'] = function($pimple){
            return new Client($pimple);
        };
    }
}