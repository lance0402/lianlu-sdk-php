<?php
namespace Lianlu\Lianlu\Common;

class Request
{
    /**
     * send
     * 发起请求
     * @param $json
     * @param $url
     * @param int $second
     * @return bool|string
     */
    public static function postCurl($json, $url, $second = 5)
    {
        $ch = curl_init();

        //设置超时
        curl_setopt($ch, CURLOPT_TIMEOUT, $second);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        //post提交方式
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //获取的信息以文件流的形式返回，而不是直接输出
        curl_setopt($ch, CURLOPT_HEADER, false);

        if (false !== strpos($url, "https")) {
            // 证书
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,  false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  false);
        }

        $response = curl_exec($ch); // 已经获取到内容，没有输出到页面上。

        curl_close($ch);
        return $response;
    }
}