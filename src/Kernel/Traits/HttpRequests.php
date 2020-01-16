<?php

namespace Godforheart\Easyalipay\Kernel\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\HandlerStack;
use Psr\Http\Message\ResponseInterface;

trait HttpRequests
{
    /**
     * @var ClientInterface
     */
    protected $httpClient;

    public function setHttpClient(ClientInterface $client)
    {
        $this->httpClient = $client;
        return $this;
    }

    /**
     * Return GuzzleHttp\ClientInterface instance.
     *
     * @return ClientInterface
     */
    public function getHttpClient(): ClientInterface
    {
        if (!$this->httpClient) {
            if (property_exists($this, 'app') && $this->app['http_client']) {
                $this->httpClient = $this->app['http_client'];
            } else {
                $this->httpClient = new Client(['handler' => HandlerStack::create(\GuzzleHttp\choose_handler())]);
            }
        }
        return $this->httpClient;
    }

    /**
     * @param string $uri
     * @param string $method
     * @param array $params
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request(string $uri,$method = 'GET', array $params = []): ResponseInterface
    {
        $response = $this->getHttpClient()->request($method, $uri, $params);
        $response->getBody()->rewind();

        return $response;
    }
}