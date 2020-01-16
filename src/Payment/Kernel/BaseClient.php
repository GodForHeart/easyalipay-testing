<?php

namespace Godforheart\Easyalipay\Payment\Kernel;

use Exception;
use Godforheart\Easyalipay\Kernel\Support\Arr;
use Godforheart\Easyalipay\Kernel\Traits\HttpRequests;
use Godforheart\Easyalipay\Payment\Application;
use function Godforheart\Easyalipay\Kernel\generate_sign;
use function Godforheart\Easyalipay\Kernel\get_pri_key;
use function Godforheart\Easyalipay\Kernel\get_sign_content;

class BaseClient
{
    use HttpRequests {
        request as httpRequest;
    }
    /**
     * @var Application
     */
    protected $app;

    /**
     * BaseClient constructor.
     * @param Application $application
     */
    public function __construct(Application $application)
    {
        $this->app = $application;

        $this->setHttpClient($this->app['http_client']);
    }

    public function request(string $method, array $apiParams)
    {
        $sysParams["app_id"] = $this->app['config']['app_id'];
        $sysParams["version"] = "1.0";
        $sysParams["format"] = "json";
        $sysParams["sign_type"] = $this->app['config']['sign_type'];
        $sysParams["method"] = $method;
        $sysParams["timestamp"] = date("Y-m-d H:i:s");
        $sysParams["notify_url"] = $this->app['config']['notify_url'];
        $sysParams["charset"] = "UTF-8";

//        if ($authToken) {
//            $sysParams["auth_token"] = $authToken;
//        }

        if ($this->app['config']['is_agent']) {
            if (!$this->app['config']['app_auth_token']) {
                throw new Exception('服务商支付需要app_auth_token参数，否则无法获得佣金');
            }
            if (!$this->app['config']['agent']['sys_service_provider_id']) {
                throw new Exception('服务商支付需要sys_service_provider_id参数，否则无法获得佣金');
            }
            $sysParams['app_auth_token'] = $this->app['config']['app_auth_token'];
            $apiParams['extend_params']['sys_service_provider_id'] = $this->app['config']['agent']['sys_service_provider_id'];
        }

        $params["biz_content"] = json_encode($apiParams);

        $sysParams['sign'] = generate_sign(
            get_sign_content(array_merge($sysParams, $params)),
            $this->app['config']['sign_type'],
            get_pri_key(
                $this->app['config']['rsa_private_key_file_path'] ? true : false,
                $this->app['config']['rsa_private_key_file_path'] ?: $this->app['config']['rsa_private_key']
            )
        );

        //系统参数放入GET请求串
        $requestUri = "?";
        foreach ($sysParams as $sysParamKey => $sysParamValue) {
            $requestUri .= "$sysParamKey=" . urlencode($sysParamValue) . "&";
        }
        $requestUri = substr($requestUri, 0, -1);

        $options = [
            'form_params' => $params
        ];
//var_dump($requestUri, $options);exit;
        $content = $this->httpRequest($requestUri, 'POST', $options);
        var_dump($content->getHeaders());exit;
        $content = $content->getBody()->getContents();

        $content = \preg_replace('/[\x00-\x1F\x80-\x9F]/u', '', $content);

        return Arr::get(
            json_decode($content, true, 512, JSON_BIGINT_AS_STRING),
            $this->getResponseKeyName($method)
        );
    }

    private function getResponseKeyName($method)
    {
        return str_replace(".", "_", $method) . '_response';
    }
}