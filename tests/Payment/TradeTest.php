<?php

namespace Tests\Payment;

use Tests\TestCase;

class TradeTest extends TestCase
{
    public function testPreCreate()
    {
        $outTradeNo = $this->getOutTradeNo();
        $response = $this->getPaymentApp()->trade->precreate($outTradeNo, '10', '聚力套餐' . $outTradeNo, [
//            'body' => '聚力套餐介绍',
//            'product_code' => 'FACE_TO_FACE_PAYMENT',
//            'operator_id' => 1,
//            'store_id' => 1,
//            'terminal_id' => '设备1',
            //  m-分钟，h-小时，d-天，1c-当天（1c-当天的情况下，无论交易何时创建，都在0点关闭）。该参数数值不接受小数点
//            'timeout_express' => '15m'
        ]);
        var_dump($response, 'success', $outTradeNo);
        [
            "code" => "10000",
            "msg" => "Success",
            "out_trade_no" => "T20200115064906xxxxxxxx",
            "qr_code" => "https://qr.alipay.com/xxxxxxxxxxxxxx",
        ];
    }

    public function testCancel()
    {
        $response = $this->getPaymentApp()->trade->cancel('T20200115064906xxxxxx');
        var_dump($response, 'success');
        [
            "code" => "10000",
            "msg" => "Success",
            "out_trade_no" => "T20200115064906xxxxxxx",
            "retry_flag" => "N",
        ];
    }
}