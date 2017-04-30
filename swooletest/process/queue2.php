<?php
$workers = [];
$worker_num = 2;

for($i = 0; $i < $worker_num; $i++)
{
    $process = new swoole_process('callback_function',false,false);
    $process->useQueue();
    $pid = $process->start();
    $workers[$pid] = $process;
    //echo "Master: new worker, PID=".$pid."\n";
}

function callback_function(swoole_process $worker)
{
    //echo "Worker: start. PID=".$worker->pid."\n";
    //recv data from master
    echo 1;
    $recv = $worker->pop();
    echo 2;
    echo "From Master: $recv\n";
    $worker->push(" \n   hehe   \n ");//这里子进程向主进程发送  hehe
    echo 3;
    //sleep(2);//注意这里有个sleep
    $worker->exit(0);

}

foreach($workers as $pid => $process)
{
    echo 4;
    $process->push("hello worker[$pid]\n");
    echo 5;
    $result = $process->pop();
    echo 6;
    echo "From worker: $result\n";//这里主进程，接受到的子进程的数据
}

for($i = 0; $i < $worker_num; $i++)
{
    $ret = swoole_process::wait();
    $pid = $ret['pid'];
    unset($workers[$pid]);
    echo "Worker Exit, PID=".$pid.PHP_EOL;
}