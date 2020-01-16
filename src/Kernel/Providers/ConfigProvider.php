<?php

namespace Godforheart\Easyalipay\Kernel\Providers;

use Godforheart\Easyalipay\Kernel\Config;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ConfigProvider implements ServiceProviderInterface
{
    /**
     * @inheritDoc
     */
    public function register(Container $pimple)
    {
        $pimple['config'] = function($app){
            return new Config($app->getConfig());
        };
    }
}