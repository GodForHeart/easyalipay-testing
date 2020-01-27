<?php

namespace Godforheart\Easyalipay\Payment\Trade;

use Exception;
use Godforheart\Easyalipay\Payment\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 统一收单线下交易预创建
     * 二维码支付
     * @param array $data
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function precreate(string $outTradeNo,float $totalAmount,string $subject,array $other = [])
    {
        return $this->request('alipay.trade.precreate', array_merge([
            'out_trade_no' => $outTradeNo,
            'total_amount' => $totalAmount,
            'subject' => $subject
        ],$other));
    }

    /**
     * 统一收单交易撤销接口
     * @param string $outTradeNo
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function cancel(string $outTradeNo)
    {
        return $this->request('alipay.trade.cancel', [
            'out_trade_no' => $outTradeNo,
        ]);
    }
}