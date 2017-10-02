<?php
/**
* rabbitmq 生产者
* @date 2017-10-2
* @author chenweirui
*/
 

// 路由器关键字
$routingkey='mykey';
// 交换机名称
$exchangeName = 'myexchange';
$useQueueName = 'queue5';
//设置你的连接
$conn_args = array('host' => 'localhost', 'port' => '5672', 'login' => 'guest', 'password' => 'guest');
$conn = new AMQPConnection($conn_args);
if ($conn->connect()) {
    echo "Established a connection to the broker \n";
}
else {
    echo "Cannot connect to the broker \n ";
}
//你的消息
$message = json_encode(array('Hello World5!','php3','c++3:'));
//创建channel
$channel = new AMQPChannel($conn);
//创建exchange
$ex = new AMQPExchange($channel);
$ex->setName($exchangeName);//创建名字
$ex->setType(AMQP_EX_TYPE_DIRECT);
$ex->setFlags(AMQP_DURABLE);
//$ex->setFlags(AMQP_AUTODELETE);
//echo "exchange status:".$ex->declare();
echo "exchange status:".$ex->declareExchange();
echo "\n";
/*
for($i=0;$i<100;$i++){
        if($routingkey=='key2'){
                $routingkey='key';
        }else{
                $routingkey='key2';
        }
        $ex->publish($message,$routingkey);
}
*/
// $ex->publish($message,$routingkey);
//创建队列
$q = new AMQPQueue($channel);
//设置队列名字 如果不存在则添加
$q->setName($useQueueName);
$q->setFlags(AMQP_DURABLE | AMQP_AUTODELETE);
//$q->setFlags(AMQP_AUTODELETE);
echo "queue status: ".$q->declare();
echo "\n";
echo 'queue bind: '.$q->bind($exchangeName, $routingkey);
//将你的队列绑定到routingKey
echo "\n";

//$channel->startTransaction();
// 模拟生产
for ($i = 0; $i < 1000000; $i++) {
	echo "send: ".$ex->publish("我是生产者，消息（{$i}）", $routingkey); //将你的消息通过制定routingKey发送
}
//echo "send: ".$ex->publish($message, $routingkey); //将你的消息通过制定routingKey发送
//$channel->commitTransaction();
$conn->disconnect();

