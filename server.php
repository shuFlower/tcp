<?php
/**
 * Created by PhpStorm.
 * User: flower
 * Date: 2015/8/18
 * Time: 21:59
 */

set_time_limit(0);
error_reporting(E_CORE_ERROR);  //屏蔽错误

$dst_ip = 'localhost';  //ip
$dst_port = 11197;  //port

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);  //tcp连接
if (!$socket) {
    echo 'create error:' . socket_strerror(socket_last_error($socket));  //创建socket
    exit;
}

$bind = socket_bind($socket, $dst_ip, $dst_port);
if (!$bind) {
    echo 'bind error:' . socket_strerror(socket_last_error($socket));  //绑定
    exit;
}

while (true) {
    $hear = socket_read($socket, 1024);  //读取client发送的信息
    if ($hear) {
        echo 'accept: ' . $hear . '</br>';
    }

    if (!empty($hear)) {
        $words = 'world3';
        socket_write($socket, $words);  //发送信息到client
        echo 'send : ' . $words;
    }
    usleep(100000);  //避免频繁死循环死机，sleep
}
socket_close($socket);
