<?php namespace Sky\Utils\Encry;

/**
 * Created by PhpStorm.
 * User: wangyulu
 * Date: 2018/5/22
 * Time: 14:15
 */

class Symmetry
{
    /**
     * 加密
     * DES加密算法
     *  1.将原文：“123456”转成 byte 数组。（123456 是字符不是数字）
     *  2.将 key：“11111111” 转成 byte 数组。（11111111 是字符不是数字，如果长度不够 8 位则补 0，如果超过 8 位则取前 8 位。）
     *  3.原文与 key 做标准 des 算法加密得到 byte 数组。
     *  4.将得到的 byte 数组转成 16 进制展示。（一个 byte8 位，要用两个 16 进制字符表示，得到的展示字符串长度应是 byte 数组长度的 2 倍）
     *
     * DES 解密步骤与加密步骤相反，此处从略。
     *
     * @param $data
     * @param $key
     * @return string
     */
    public static function desDec($data, $key)
    {
        $str = hex2bin($data);
        $str = mcrypt_decrypt(MCRYPT_DES, $key, $str, MCRYPT_MODE_ECB);
        $pad = ord($str[($len = strlen($str)) - 1]);

        return substr($str, 0, strlen($str) - $pad);
    }

    /**
     * DES 解密
     *
     * @param $data
     * @param $key
     * @return string
     */
    public static function desEnc($data, $key)
    {
        $block = mcrypt_get_block_size(MCRYPT_DES, MCRYPT_MODE_ECB);
        $len = strlen($data);
        $padding = $block - ($len % $block);
        $data .= str_repeat(chr($padding), $padding);

        return bin2hex(mcrypt_encrypt(MCRYPT_DES, $key, $data, MCRYPT_MODE_ECB));
    }
}