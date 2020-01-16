<?php

namespace Godforheart\Easyalipay;

/**
 * Class EasyAlipay
 * @package Godforheart\Easyalipay
 *
 * @method static \Godforheart\Easyalipay\Payment\Application            payment(array $config)
 */
class EasyAlipay
{
    /**
     * @param string $name
     * @param array  $config
     *
     * @return \Godforheart\Easyalipay\Kernel\ServiceContainer
     */
    public static function make($name, array $config)
    {
        $namespace = ucfirst($name);
        $application = "\\Godforheart\\Easyalipay\\{$namespace}\\Application";

        return new $application($config);
    }

    /**
     * Dynamically pass methods to the application.
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return self::make($name, ...$arguments);
    }

}