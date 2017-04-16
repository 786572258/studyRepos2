<?php
  $serv = new swoole_server("0.0.0.0", 9501);
  $serv->on('connect', function ($serv, $fd){
    echo "Client:Connect.";
  });
  $serv->on('receive', function ($serv, $fd, $from_id, $data) {
	$serv->send($fd, '服务器接收到的数据: '.$data);
  	file_put_contents('data.log', $data . "\r\n", FILE_APPEND);
  });
  $serv->on('close', function ($serv, $fd) {
    echo "Client: 客户端断开";
  });
  $serv->start();
