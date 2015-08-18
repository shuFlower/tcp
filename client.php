<?php
/**
 * Created by PhpStorm.
 * User: flower
 * Date: 2015/8/18
 * Time: 21:58
 */

$src_ip = 'localhost';
$src_port = 11198;

$socket = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
if(!$socket)
{
    echo 'create error:'.socket_strerror(socket_last_error());
}

$connect = socket_connect($socket,$src_ip,$src_port);
if(!$connect)
{
    echo 'connect error:'.socket_strerror(socket_last_error());
    socket_close($socket);
    exit;
}


$words='hello3';
echo 'send :'.$words.'</br>';
socket_write($socket,$words);

$hear=socket_read($socket,1024);
echo 'accept :'.$hear;
socket_close($socket);