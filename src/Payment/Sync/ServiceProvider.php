<?php

namespace Godforheart\Easyalipay\Payment\Sync;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * @inheritDoc
     */
    public function register(Container $pimple)
    {
        $pimple['sync'] = function($pimple){
            return new Client($pimple);
        };
    }
}