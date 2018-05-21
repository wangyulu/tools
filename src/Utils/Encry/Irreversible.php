<?php namespace Sky\Utils\Encry;

/**
 * Created by PhpStorm.
 * User: wangyulu
 * Date: 2018/5/21
 * Time: 16:05
 * Desc: 提供不可逆加签验签算法服务
 */

class Irreversible
{
    /**
     * 生成签名
     * 签名算法
     *  加签采用sha1不可逆算法，由服务商提供加签key(secretKey), secretKey为32位UUID。
     *  签名算法描述：
     *      对body里参数按照键名正排序;
     *      对排序后的键值进行拼接，得到拼接字符串A; 
     *      拼接规则：A = key1+value1+key2+value2+…
     *      计算拼接字符串A的 sha1 散列值，获得字符串B;
     *      将散列值、私钥、requestId拼接起来，获得字符串C; 
     *      拼接规则：C = B+私钥+ requestId
     *      对拼接字符串C进行md5加密，获得签名sign
     * @param array  $data
     * @param string $uuid
     * @return string
     */
    public static function genSign(array $data = [], $uuid = '')
    {
        ksort($data);
        $jointStr = '';
        foreach ($data as $key => $val) {
            if (is_array($val)) {
                $val = json_encode($val);
            }
            $jointStr .= $key . $val;
        }

        // 私钥（服务商提供）
        $secret = 't';

        $jointStr = sha1($jointStr) . $secret . $uuid;

        return md5($jointStr);
    }
}