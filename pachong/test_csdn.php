<?php
   //测试扥路csdn不行
    $username = "yonhum ";
    $password = "密码";
    $data="username={$username}&password={$password}&fkid=fkid&execution=e35s1";
    $curlobj = curl_init();          // 初始化
    curl_setopt($curlobj, CURLOPT_URL, "https://passport.csdn.net/account/login");    // 设置访问网页的URL
    curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);// 执行之后不直接打印出来

    /*
        Cookie相关设置，这部分设置需要在所有会话开始之前设置
    */
    //启用时curl会仅仅传递一个session cookie，忽略其他的cookie
    curl_setopt($curlobj,CURLOPT_COOKIESESSION,TRUE);
    //设置cookie文件
    curl_setopt($curlobj, CURLOPT_COOKIEFILE, "mycookie");
    //cookie读取
    curl_setopt($curlobj, CURLOPT_COOKIEJAR, "mycookie");
    //变量名为session_name()获取的名称，值通过session_id()获取
    curl_setopt($curlobj,CURLOPT_COOKIE,session_name().'='.session_id());
    curl_setopt($curlobj,CURLOPT_HEADER,0);
    //这样能够让curl支持页面链接跳转,即可以到达我们想要的页面
    curl_setopt($curlobj, CURLOPT_FOLLOWLOCATION, 1);
    //设置post方式提交
    curl_setopt($curlobj, CURLOPT_POST, 1);
    //设置post数据,post可以是数组，也可以是拼接
    curl_setopt($curlobj, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curlobj, CURLOPT_HTTPHEADER, array("application/x-www-form-urlencoded; charset=utf-8",
       "Content-length: ".strlen($data)));
    curl_exec($curlobj); 
    //设置cookie文件
    curl_setopt($curlobj, CURLOPT_COOKIEFILE, "mycookie");
    //cookie读取
    curl_setopt($curlobj, CURLOPT_COOKIEJAR, "mycookie");
    //变量名为session_name()获取的名称，值通过session_id()获取
    curl_setopt($curlobj,CURLOPT_COOKIE,session_name().'='.session_id());
    //打开个人中心页面
    curl_setopt($curlobj, CURLOPT_URL, "http://blog.csdn.net");
    //下载网页不是post操作，所以需要重新设为0
    curl_setopt($curlobj, CURLOPT_POST, 0);
    curl_setopt($curlobj, CURLOPT_HTTPHEADER, array("Content-type: text/xml"));
    $output = curl_exec($curlobj);
    curl_close($curlobj); 
    echo $output;