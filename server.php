<?php
/**
 * Created by PhpStorm.
 * User: flower
 * Date: 2015/8/18
 * Time: 21:59
 */

set_time_limit( 0 );

$dst_ip = 'localhost';
$dst_port = 11198;

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if(!$socket)
{
    echo 'create error:'.socket_strerror(socket_last_error());
}
$bind = socket_bind($socket, $dst_ip, $dst_port);
if(!$bind)
{
    echo 'bind error:'.socket_strerror(socket_last_error());
}

//socket_listen($socket);
//$acpt = socket_accept($socket);
while(true)
{
    $connection = socket_listen($socket);
    if(!$connection)
    {
        continue;
    }

    $acpt = socket_accept($socket);
    $hear=socket_read($acpt,1024);
    echo 'accept: '.$hear.'</br>';

    $words='world3';
    socket_write($acpt,$words);
    echo 'send : '.$words;


//    usleep( 100000 );
}
socket_close($socket);