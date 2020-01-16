<?php

namespace Godforheart\Easyalipay\Payment\Close;

use Godforheart\Easyalipay\Payment\Kernel\BaseClient;

class Client extends BaseClient
{
    public function byTradeNo(string $tradeNo,string $operatorId = '')
    {
        return $this->request('alipay.trade.close', array_filter([
            'trade_no' => $tradeNo,
            'operator_id' => $operatorId,
        ]));
    }
    public function byOutTradeNo(string $outTradeNo,string $operatorId = '')
    {
        return $this->request('alipay.trade.close', array_filter([
            'out_trade_no' => $outTradeNo,
            'operator_id' => $operatorId,
        ]));
    }
}