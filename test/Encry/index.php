<?php

/**
 * Created by PhpStorm.
 * User: wangyulu
 * Date: 2018/5/21
 * Time: 16:12
 */

// **************
// 依赖 mcrypt 扩展，PHP7.1.0及以上已被弃用
// **************

// 注意引入实际的加载目录
require __DIR__ . '/../../vendor/autoload.php';

// 加解密key
$key = 'kj8sdh8w';

$data = '972653707@qq.com';

echo "加密前的数据：{$data}" . PHP_EOL;
$data = \Sky\Utils\Encry\Symmetry::desEnc($data, $key);
echo "加密后的数据：{$data}" . PHP_EOL;
$data = \Sky\Utils\Encry\Symmetry::desdec($data, $key);
echo "解密后的数据：{$data}" . PHP_EOL;


