<form action="" method="get">
	<input type="text" name="keyword" >
	<input type="submit" >
</form>
<?php
if ($_GET) {


	$client = new swoole_client(SWOOLE_SOCK_TCP, SWOOLE_SOCK_SYNC); //同步阻塞
	$ret = $client->connect('127.0.0.1', 9501, 0.5, 0);
	$client->send($_GET['keyword']);
	$client->send($_GET['keyword']. '2222');
	$client->send(array('234'=>'dddddd'));
	$data = $client->recv(1024);
	echo $data;
	unset($client);
}
