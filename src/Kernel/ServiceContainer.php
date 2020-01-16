<?php

namespace Godforheart\Easyalipay\Kernel;

use Godforheart\Easyalipay\Kernel\Providers\ConfigProvider;
use Godforheart\Easyalipay\Kernel\Providers\HttpClientServiceProvider;
use Pimple\Container;

class ServiceContainer extends Container
{
    /**
     * 应用程序所需供应商
     * @var array
     */
    protected $providers = [];

    /**
     * 用户自定义配置
     * @var array
     */
    protected $userConfig = [];

    /**
     * @var array
     */
    protected $defaultConfig = [];

    public function __construct(array $config = [])
    {
        $this->registerProviders($this->getProviders());

        parent::__construct();

        $this->userConfig = $config;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        $base = [
            // http://docs.guzzlephp.org/en/stable/request-options.html
            'http' => [
                'timeout' => 30.0,
                'base_uri' => 'https://openapi.alipay.com/gateway.do',
            ],
        ];

        return array_replace_recursive($base, $this->defaultConfig, $this->userConfig);
    }

    /**
     * Magic get access.
     *
     * @param string $id
     *
     * @return mixed
     */
    public function __get($id)
    {
//        if ($this->shouldDelegate($id)) {
//            return $this->delegateTo($id);
//        }

        return $this->offsetGet($id);
    }

    /**
     * Magic set access.
     *
     * @param string $id
     * @param mixed $value
     */
    public function __set($id, $value)
    {
        $this->offsetSet($id, $value);
    }

    /**
     * Return all providers.
     *
     * @return array
     */
    public function getProviders()
    {
        return array_merge([
            ConfigProvider::class,
            HttpClientServiceProvider::class
        ], $this->providers);
    }

    /**
     * 注册服务供应商
     * @param array $providers
     */
    public function registerProviders(array $providers)
    {
        foreach ($providers as $provider) {
            parent::register(new $provider());
        }
    }
}
