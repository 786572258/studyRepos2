<?php
     function login() {
        $ret = '';
        
        
        $command = "./phantomjs test2.js";
        $cookie_json = exec($command);  //只返回最后一行
        ///echo '--------';
       /// print_r($cookie_json);
        ///exit;
        //echo $cookie_json.'<br/><br/>';  //test
        if ($cookie_json) {
            $cookie_arr = json_decode($cookie_json, true);
           // print_r($cookie_arr); //test
          //  exit;
            if ($cookie_arr) {
                foreach ($cookie_arr as $cookie) {
                    //echo $cookie['value'].'  ';
                    //注意：不要用setcookie()，用setrawcookie()不会对cookie value进行url编码
                    $ret .= "{$cookie['name']}={$cookie['value']}; ";
                }
            }
        }
        if ($ret) {
            echo '登录成功！';
            echo $ret;

           // header("Content-type:text/html;Charset=utf8");  
            $ch =curl_init();  
            curl_setopt($ch,CURLOPT_URL,'https://account.xiaomi.com/pass/auth/security/home?cUserId=jDnD63MfthaqqgfefdjckqvNj6E&userId=177202576');  
              
            $header = array();  
            //curl_setopt($ch,CURLOPT_POST,true);  
            //curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);  
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);  
            curl_setopt($ch,CURLOPT_HEADER,false);  
            //curl_setopt($ch,CURLOPT_HTTPHEADER,$header);  
            curl_setopt($ch,CURLOPT_COOKIE, $ret);  
              
              
            $content = curl_exec($ch);  
              
            /*echo "<pre>";print_r(curl_error($ch));echo "</pre>";  
            echo "<pre>";print_r(curl_getinfo($ch));echo "</pre>";  
            echo "<pre>";print_r($header);echo "</pre>";  */
            //echo "</br>",$content;  

            //var_dump($content);
            file_put_contents('xiaomilogin.html', $content);
        }
        
        //return $ret;
    }

    login();