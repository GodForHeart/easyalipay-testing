<?php

namespace Godforheart\Easyalipay\Kernel;

function generate_sign($data, $signType, $res)
{
    if ("RSA2" == $signType) {
        openssl_sign($data, $sign, $res, OPENSSL_ALGO_SHA256);
    } else {
        openssl_sign($data, $sign, $res);
    }

    $sign = base64_encode($sign);
    return $sign;
}

function get_pri_key(bool $isFile, string $content)
{
    if ($isFile) {
        $priKey = file_get_contents($content);
        $res = openssl_get_privatekey($priKey);
        openssl_free_key($res);
    } else {
        $priKey = $content;
        $res = "-----BEGIN RSA PRIVATE KEY-----\n" .
            wordwrap($priKey, 64, "\n", true) .
            "\n-----END RSA PRIVATE KEY-----";
    }
    ($res) or die('您使用的私钥格式错误，请检查RSA私钥配置');

    if ($isFile) {
        openssl_free_key($res);
    }

    return $res;
}

function get_sign_content(array $params)
{
    ksort($params);

    $stringToBeSigned = "";
    $i = 0;
    foreach ($params as $k => $v) {
        if (false === check_empty($v) && "@" != substr($v, 0, 1)) {
            if ($i == 0) {
                $stringToBeSigned .= "$k" . "=" . "$v";
            } else {
                $stringToBeSigned .= "&" . "$k" . "=" . "$v";
            }
            $i++;
        }
    }

    unset ($k, $v);
    return $stringToBeSigned;
}

function check_empty($value)
{
    if (!isset($value))
        return true;
    if ($value === null)
        return true;
    if (trim($value) === "")
        return true;

    return false;
}