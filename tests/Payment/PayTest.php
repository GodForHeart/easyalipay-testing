<?php

namespace Tests\Payment;

use Tests\TestCase;

class PayTest extends TestCase
{
    public function testWap()
    {
        $response = $this->getPaymentApp()->pay->wap($this->getOutTradeNo(), 'wap_pay', 10, 'https://www.juli-jianzhan.com');
        var_dump($response, 'success');
    }

    public function testApp()
    {
        $response = $this->getPaymentApp()->pay->app($this->getOutTradeNo(), 'app_pay', 10);
        var_dump($response, 'success');
    }
}