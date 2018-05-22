<?php
/**
 * Created by PhpStorm.
 * User: wangyulu
 * Date: 2018/5/22
 * Time: 14:24
 */
// 注意引入实际的加载目录
require __DIR__ . '/../../vendor/autoload.php';

// 加密执行方式 php index.php enc
// 解密执行方式 php index.php sign

$type = $_SERVER['argv'];
if (!isset($type[1])) {
    echo 'e.g php index.php enc or dec' . PHP_EOL;
    exit;
}

// 测试参数
$params = [
    'title' => '标题一',
    'type'  => 1,
    'rooms' => [
        [
            'roomId' => 1,
            'num'    => 2
        ]
    ],
];

// enc：加密
if ($type[1] == 'enc') {
    $sign = \Sky\Utils\Sign\Sign::genSign($params);
    echo $sign . PHP_EOL;
} else {
    echo "sign : {$type[1]}" . PHP_EOL;
}
