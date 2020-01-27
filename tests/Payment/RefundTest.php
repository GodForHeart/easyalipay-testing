<?php

namespace Tests\Payment;

use Tests\TestCase;

class RefundTest extends TestCase
{
    public function testRefund()
    {
        $refundNo = 'R' . date('YmdHis') . random_int(1000, 9999);
        $response = $this->getPaymentApp()->refund->byOutTradeNo('T202001150522472494', $refundNo, 10);
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

    public function testRefundQuery()
    {
        $response = $this->getPaymentApp()->refund->queryByOutTradeNo(
            '2020011522001402051440845538',
            'T202001150522472494'
        );
        var_dump($response, 'success');
    }
}