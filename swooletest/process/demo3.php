<?php
/*$worker_num =1;//创建的进程数
for($i=0;$i<$worker_num ; $i++){
    echo 1;
    $process = new swoole_process('callback_function_we_write');
    $pid = $process->start();
    echo 3;
    echo PHP_EOL . $pid;//
}
function callback_function_we_write(swoole_process $worker){
    echo 2;
    echo  PHP_EOL;
    var_dump($worker);
    echo  PHP_EOL;
}*/


echo PHP_EOL . time() ;
$worker_num =3;//创建的进程数
for($i=0;$i<$worker_num ; $i++){
    $process = new swoole_process('callback_function_we_write');
    $pid = $process->start();
}

function callback_function_we_write(swoole_process $worker){
    for($i=0;$i<100000000;$i++){}
    echo PHP_EOL . time() ;
}