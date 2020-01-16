<?php

namespace Godforheart\Easyalipay\Payment\Refund;

use Godforheart\Easyalipay\Payment\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 根据商户号退款
     * @param string $outTradeNo
     * @param string $refundNo
     * @param float $refundAmount
     * @param array $other
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function byOutTradeNo(string $outTradeNo, float $refundAmount, string $refundNo, array $other = [])
    {
        return $this->request('alipay.trade.refund', array_merge([
            'out_trade_no' => $outTradeNo,
            'refund_amount' => $refundAmount,
            'out_request_no' => $refundNo
        ], $other));
    }

    /**
     * 根据支付宝交易号退款
     * @param string $tradeNo
     * @param string $refundNo
     * @param float $refundAmount
     * @param array $other
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function byTradeNo(string $tradeNo, float $refundAmount, string $refundNo, array $other = [])
    {
        return $this->request('alipay.trade.refund', array_merge([
            'trade_no' => $tradeNo,
            'refund_amount' => $refundAmount,
            'out_request_no' => $refundNo
        ], $other));
    }

    /**
     * 统一收单退款页面接口
     * TODO 功能未完成
     */
    public function page()
    {

    }

    public function queryByTradeNo(string $refundNo, string $tradeNo)
    {
        return $this->request('alipay.trade.fastpay.refund.query', [
            'out_request_no' => $refundNo,
            'trade_no' => $tradeNo
        ]);
    }

    public function queryByOutTradeNo(string $refundNo, string $outTradeNo)
    {
        return $this->request('alipay.trade.fastpay.refund.query', [
            'out_request_no' => $refundNo,
            'out_trade_no' => $outTradeNo
        ]);
    }
}