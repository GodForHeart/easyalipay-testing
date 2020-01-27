<?php

namespace Godforheart\Easyalipay\Payment\Pay;

use Godforheart\Easyalipay\Payment\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * TODO 未完成
     * @param string $outTradeNo
     * @param string $subject
     * @param float $totalAmount
     * @param string $quitUrl
     * @param array $data
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function wap(string $outTradeNo,string $subject,float $totalAmount,string $quitUrl,array $data = [])
    {
        return $this->request('alipay.trade.wap.pay',array_merge([
            'subject' => $subject,
            'out_trade_no' => $outTradeNo,
            'total_amount' => $totalAmount,
            'quit_url' => $quitUrl,
            'product_code' => 'QUICK_WAP_WAY'
        ], $data));
    }

    public function app(string $outTradeNo,string $subject,float $totalAmount,array $data = [])
    {
        return $this->request('alipay.trade.app.pay',array_merge([
            'out_trade_no' => $outTradeNo,
            'subject' => $subject,
            'total_amount' => $totalAmount,
            'product_code' => 'QUICK_MSECURITY_PAY'
        ],$data));
    }
}