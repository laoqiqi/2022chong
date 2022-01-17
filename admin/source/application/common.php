<?php

// 应用公共函数库文件

use think\Request;

/**
 * 打印调试函数
 * @param $content
 * @param $is_die
 */
function pre($content, $is_die = true)
{
    header('Content-type: text/html; charset=utf-8');
    echo '<pre>' . print_r($content, true);
    $is_die && die();
}

/**
 * 驼峰命名转下划线命名
 * @param $str
 * @return string
 */
function toUnderScore($str)
{
    $dstr = preg_replace_callback('/([A-Z]+)/', function ($matchs) {
        return '_' . strtolower($matchs[0]);
    }, $str);
    return trim(preg_replace('/_{2,}/', '_', $dstr), '_');
}

/**
 * 生成密码hash值
 * @param $password
 * @return string
 */
function yoshop_hash($password)
{
    return md5(md5($password) . 'yoshop_salt_SmTRx');
}

/**
 * 获取当前域名及根路径
 * @return string
 */
function base_url()
{
    $request = Request::instance();
    $subDir = str_replace('\\', '/', dirname($request->server('PHP_SELF')));
    return $request->scheme() . '://' . $request->host() . $subDir . ($subDir === '/' ? '' : '/');
}

/**
 * 写入日志
 * @param string|array $values
 * @param string $dir
 * @return bool|int
 */
function write_log($values, $dir)
{
    if (is_array($values))
        $values = print_r($values, true);
    // 日志内容
    $content = '[' . date('Y-m-d H:i:s') . ']' . PHP_EOL . $values . PHP_EOL . PHP_EOL;
    try {
        // 文件路径
        $filePath = $dir . '/logs/';
        // 路径不存在则创建
        !is_dir($filePath) && mkdir($filePath, 0755, true);
        // 写入文件
        return file_put_contents($filePath . date('Ymd') . '.log', $content, FILE_APPEND);
    } catch (\Exception $e) {
        return false;
    }
}

/**
 * curl请求指定url
 * @param $url
 * @param array $data
 * @return mixed
 */
function curl($url, $data = [])
{
    // 处理get数据
    if (!empty($data)) {
        $url = $url . '?' . http_build_query($data);
    }
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//这个是重点。
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}

if (!function_exists('array_column')) {
    /**
     * array_column 兼容低版本php
     * (PHP < 5.5.0)
     * @param $array
     * @param $columnKey
     * @param null $indexKey
     * @return array
     */
    function array_column($array, $columnKey, $indexKey = null)
    {
        $result = array();
        foreach ($array as $subArray) {
            if (is_null($indexKey) && array_key_exists($columnKey, $subArray)) {
                $result[] = is_object($subArray) ? $subArray->$columnKey : $subArray[$columnKey];
            } elseif (array_key_exists($indexKey, $subArray)) {
                if (is_null($columnKey)) {
                    $index = is_object($subArray) ? $subArray->$indexKey : $subArray[$indexKey];
                    $result[$index] = $subArray;
                } elseif (array_key_exists($columnKey, $subArray)) {
                    $index = is_object($subArray) ? $subArray->$indexKey : $subArray[$indexKey];
                    $result[$index] = is_object($subArray) ? $subArray->$columnKey : $subArray[$columnKey];
                }
            }
        }
        return $result;
    }
}

/**
 * 多维数组合并
 * @param $array1
 * @param $array2
 * @return array
 */
function array_merge_multiple($array1, $array2)
{
    $merge = $array1 + $array2;
    $data = [];
    foreach ($merge as $key => $val) {
        if (
            isset($array1[$key])
            && is_array($array1[$key])
            && isset($array2[$key])
            && is_array($array2[$key])
        ) {
            $data[$key] = array_merge_multiple($array1[$key], $array2[$key]);
        } else {
            $data[$key] = isset($array2[$key]) ? $array2[$key] : $array1[$key];
        }
    }
    return $data;
}

/**
 * 获取全局唯一标识符
 * @param bool $trim
 * @return string
 */
function getGuidV4($trim = true)
{
    // Windows
    if (function_exists('com_create_guid') === true) {
        $charid = com_create_guid();
        return $trim == true ? trim($charid, '{}') : $charid;
    }
    // OSX/Linux
    if (function_exists('openssl_random_pseudo_bytes') === true) {
        $data = openssl_random_pseudo_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);    // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);    // set bits 6-7 to 10
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
    // Fallback (PHP 4.2+)
    mt_srand((double)microtime() * 10000);
    $charid = strtolower(md5(uniqid(rand(), true)));
    $hyphen = chr(45);                  // "-"
    $lbrace = $trim ? "" : chr(123);    // "{"
    $rbrace = $trim ? "" : chr(125);    // "}"
    $guidv4 = $lbrace .
        substr($charid, 0, 8) . $hyphen .
        substr($charid, 8, 4) . $hyphen .
        substr($charid, 12, 4) . $hyphen .
        substr($charid, 16, 4) . $hyphen .
        substr($charid, 20, 12) .
        $rbrace;
    return $guidv4;
}

//支付宝支付
function aliZhifu($gender,$order_no,$url)
{
    $money=2;
    vendor('alipay.aop.request.AlipayTradeWapPayRequest');
    vendor('alipay.aop.AopClient');
    //订单号
    $out_trade_no= $order_no;
    $aop = new \AopClient ();
    $aop->method = 'alipay.trade.wap.pay';
    $aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
    $aop->appId = '2021002109692580';
    $aop->method='alipay.trade.wap.pay';
    $aop->rsaPrivateKey = 'MIIEowIBAAKCAQEAnEnA/hvrnmyl23BJ/v94xJwsz8VLRfw3A1YgJyMtkXYhmd13IYK97uwfcdlD9BS/szHywpSdoyh6vqrhOlDsJ9AeAiJJO/Y2FLy+cEQGrhgBCkvfyDAXLI7DNIf5Mj+8SFxfee/qIl/ii2fC3pjJBQe5GoyohJC4vBtRSCT7/l+5mS6qcjzohX4CivumATa01AYBvYSbMYq/3Fy1gExKjB28n/FIlGMAtQgTAKXD3v1hmAi76Fjo7uxa3P9fGGeefDnCGvOEyRuE4zIugoHpWWrcvYNsP8NSyDL6phGqy3MG6x5xV8TkfyPOGQiDmCllweBdGB7F0ttaQzFK7MosqQIDAQABAoIBAEVmgurUHyb0fBobnOA9NbWo3EVPCQQE4bD7l7+JYXzMhlM7AuHAmvLzq2r03bYPWKkMLw60y+Nd4FO2sdkhghyT0B+GdhrIVG+U+MQFkSnRwvR9iNvubvv8UTaMgt4La2J+km8lWET3azQYWXJbSjiPm2TsvRBQ65esUcXFlpj3216pLh6qGhONLZx/HvvzkFe+OxSfDOb4Tlv5PLm46nVt7hP1rPB+84HOJ2KWMaPaP0nsTMu0QGAoL2bGPxb8vEg0no0/lrlDymMSBc4tPk8YKmnPyqMZfMpEtFc+QRmr+OWft2TVNtih/ePI7voZILhn8TnFU4NHAatAy1MO2TkCgYEAyTwrwd64zEg0nPrQIc1mnoR4GOKlEbhRIm7HIu0vvnr9blxFn/LLXY0fah/Y2I2en/Lwiika98VruTlhraled2oRcLeWAHk/VJYna1Pf5lz+YTjjIlU803ciOFOPr4UroSO1mruGdsIP9X7/viOF2ZUN38Q6I3ryWdWXSUJRyzMCgYEAxtIth7n9mmLoYIjKvYMMV3J9VFetyZDTGtAgurbPu7TdEYiD6FXEJfkUFkjH0K5jCgWvcAJ5bJxUNlRF+WEjeoZ1dTWRl95BdW9c6lfTvl6FEI0RsO9BwuUHjWtzJbpQmAdolUOV/klS6dhXq6efkHRQxwdN/TUbJt4ARW/CiLMCgYAsCbTxulHqsqqA6AqAOzkH26mEmKTTGej3hhKiPBHEt5maeyrpc/K5SFblnI6R5XwfOMUXFyPFsTh/0mTj4jrAG0Ax0JtNAzuuwSVjQXmwKg2pLQ/XxZuIE3wzo2XAXX5Mx0nI0Nz+RD3F1cMV0yRJl2rv2zt15EQBENMIvzCzLQKBgA2+7DztA/aPjgdWjcXKcKj/FmElarN72syIxSqDhxswJvSWXqBKhbQmY1gjEgWAeQJxYC67TQ/QQxY6f1f9ekl3UFmZKYa5bAcleuQMzGvl9wcs6aM093P1B6+kVSKvnfDU2ksvkAgzo5LdTTpl7Wc8U3VfMOonqMfoI1apomZ3AoGBAJrqnwtwldHgI0dBG2q0ev+kqLAi9iLO7FOQ2o0W8mU5ARqWJWPeJ+NvAXYhcBvI3kq0xAyweps3TmTbz6ERrS6MJTBh7lvXRtIZZGhtLa497gRbhpWKWJZDJgphHw1lpxwvIclv3Yv+6gFJuCWlvUXAM7KMz1cqcTq9bsHTvlch';
    $aop->alipayrsaPublicKey='MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAolm+Bmgd2ysNcyYZc7mnAhntb0WGqUbVwsZZbzhZvjLKTXdhVKdoMqcFda9l9rawyKoTavfdI3FvrHsmQe8uCoXI8ejQXP6QwTi8zSnqY2kTggG+UFGG/qhzvmFjN4fWiw1G26C599Y82LEuxMcFSsX6AXkCfZxfMXAlp3EPOk7+ZpGLKLYkMkhvJ6Gki3EVLdfKeRSiv5VS6uTAEeRGEoRvNF7a1gJ8izbTf05xuzluFT/2v3CnWRLpyhDkpk3nnhb8L8bOU6MNWLg7wxJKWnyCr/0TAZNOn39juU6AYW9osgcjWgEh06cN/m0+c2tVaqkkPknkqve8NJ1Xj/F6iwIDAQA';
    $aop->apiVersion = '1.0';
    $aop->signType = 'RSA2';
    $aop->postCharset='UTF-8';
    $aop->format='json';

    $object = new \stdClass();
    $object->out_trade_no = $out_trade_no;
    $object->total_amount = $money;
    $object->subject = $gender;
    $object->product_code ='QUICK_WAP_WAY';
    $json = json_encode($object);
    $request = new \AlipayTradeWapPayRequest();

    $request->setNotifyUrl('');
    //异步回调地址
    $request->setReturnUrl($url);

    $request->setBizContent($json);
    $result = $aop->pageExecute($request);
    echo  $result;
}
