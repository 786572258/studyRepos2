//"use strict";

var page = require('webpage').create();
console.log('The default user agent is ' + page.settings.userAgent);
page.settings.userAgent = 'SpecialAgent';
page.open('https://account.xiaomi.com/pass/serviceLogin', function (status) {
    if (status !== 'success') {
        console.log('Unable to access network');
    } else {
      //  page.render('index.png');
        setTimeout(function() {
            var res = page.evaluate(function() {
                var form = document.getElementById("login-main-form");
                form.elements["username"].value = '账号';
                form.elements["pwd"].value = '密码';
                form.elements['login-button'].click();
                return document.title;
            });
            //console.log(res);
            setTimeout(function() {
                   
                console.log(JSON.stringify(page.cookies));


                //console.log('截图');
                                  //  page.render('login-succ-xiaomi.png');

                // file = fs.open("cookie.log", 'w');
                // file.write(JSON.stringify(page.cookies));
                // file.close();
                phantom.exit();
            }, 2000);

        }, 3000);


    
        console.log(ua);
    }
    phantom.exit();
});
