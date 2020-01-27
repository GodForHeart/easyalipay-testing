<?php

namespace Tests;

use Godforheart\Easyalipay\EasyAlipay;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{

    private $config = [];
    private $juliAuthToken = '202001BB4ced3ef3713a464da04e6ed656df3B58';
    private $dahuziAuthToken = '201806BB1d76c42359134879828dc2fe09955X74';

    public function __construct()
    {
        parent::__construct();
        $this->config = require __DIR__ . '/../src/config.php';
    }

    protected function getPaymentApp()
    {
        $app = $response = EasyAlipay::payment($this->config);
        $app->setAppAuthToken($this->juliAuthToken);
        return $app;
    }


    protected function getOutTradeNo()
    {
        return 'T' . date('YmdHis') . random_int(1000, 9999);
    }
}