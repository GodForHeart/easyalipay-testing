<?php

namespace Godforheart\Easyalipay\Tests;

use Godforheart\Easyalipay\EasyAlipay;
use PHPUnit\Framework\TestCase;

class PaymentTest extends TestCase
{
    private $config = [];
    private $juliAuthToken = '202001BB4ced3ef3713a464da04e6ed656df3B58';
    private $dahuziAuthToken = '201806BB1d76c42359134879828dc2fe09955X74';

    public function __construct()
    {
        parent::__construct();
        $this->config = require __DIR__ . '/../src/config.php';
    }

    private function getApp()
    {
        $app = $response = EasyAlipay::payment($this->config);
        $app->setAppAuthToken($this->juliAuthToken);
        return $app;
    }

    public function testTradePreCreate()
    {
        $outTradeNo = $this->getOutTradeNo();
        $response = $this->getApp()->trade->precreate($outTradeNo, '10', '聚力套餐' . $outTradeNo, [
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

    public function testTradeCancel()
    {
        $response = $this->getApp()->trade->cancel('T20200115064906xxxxxx');
        var_dump($response, 'success');
        [
            "code" => "10000",
            "msg" => "Success",
            "out_trade_no" => "T20200115064906xxxxxxx",
            "retry_flag" => "N",
        ];
    }

    /**
     * 关闭交易
     */
    public function testTradeClose()
    {
        $response = $this->getApp()->close->byOutTradeNo('T20200115064352xxxxxx');
        var_dump($response, 'success');
        [
            "code" => "10000",
            "msg" => "Success",
            "out_trade_no" => "T20200115064352xxxxxxx",
            "trade_no" => "2020011522001402051441xxxxxxxxx",
        ];
    }

    public function testTradeRefund()
    {
        $refundNo = 'R' . date('YmdHis') . random_int(1000, 9999);
        $response = $this->getApp()->refund->byOutTradeNo('T202001150522472494', $refundNo, 10);
        var_dump($response, 'success', $refundNo);
        [
            "code" => "10000",
            "msg" => "Success",
            "buyer_logon_id" => "150******21",
            "buyer_user_id" => "2088802908002054",
            "fund_change" => "Y",
            "gmt_refund_pay" => "2020-01-15 15:09:32",
            "out_trade_no" => "T202001150522472494",
            "refund_detail_item_list" =>
                [
                    [
                        "amount" => "10.00",
                        "fund_channel" => "PCREDIT",
                    ]
                ],
            "refund_fee" => "10.00",
            "send_back_fee" => "10.00",
            "trade_no" => "2020011522001402051440845538",
        ];
    }

    public function testTradeRefundQuery()
    {
        $response = $this->getApp()->refund->queryByOutTradeNo(
            '2020011522001402051440845538',
            'T202001150522472494'
        );
        var_dump($response, 'success');
    }

    public function testTradeWapPay()
    {
        $response = $this->getApp()->trade->wapPay($this->getOutTradeNo(), 'wap_pay', 10, 'https://www.juli-jianzhan.com');
        var_dump($response, 'success');
    }

    private function getOutTradeNo()
    {
        return 'T' . date('YmdHis') . random_int(1000, 9999);
    }
}