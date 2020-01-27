<?php

namespace Tests\Payment;

use Tests\TestCase;

class CloseTest extends TestCase
{
    /**
     * 关闭交易
     */
    public function testClose()
    {
        $response = $this->getPaymentApp()->close->byOutTradeNo('T20200115064352xxxxxx');
        var_dump($response, 'success');
        [
            "code" => "10000",
            "msg" => "Success",
            "out_trade_no" => "T20200115064352xxxxxxx",
            "trade_no" => "2020011522001402051441xxxxxxxxx",
        ];
    }
}