<?php
/**
 * Created by PhpStorm.
 * User: flower
 * Date: 2015/8/18
 * Time: 21:58
 */

error_reporting(E_CORE_ERROR);
$src_ip = 'localhost';  //ip
$src_port = 11197;  //port

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);  //创建socket
if (!$socket) {
    echo 'create error:' . socket_strerror(socket_last_error());
}

$connect = socket_connect($socket, $src_ip, $src_port);  //连接
if (!$connect) {
    echo 'connect error:' . socket_strerror(socket_last_error());
    socket_close($socket);
    exit;
}


$words = 'hello3';
echo 'send :' . $words . '</br>';
socket_write($socket, $words);  //发送信息到server

$hear = socket_read($socket, 1024);  //读取server端返回的数据
echo 'accept :' . $hear;
socket_close($socket);
