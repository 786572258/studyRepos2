var page = require('webpage').create();
var url = 'https://account.xiaomi.com/pass/serviceLogin';
page.open(url, function() {
	console.log(3);
	
    ret = page.evaluate(function() {
    	console.log(4);
        var form = document.getElementById("login-main-form");
        console.log(form);
        // form.elements["username"].value = '用户名';
        // form.elements["pwd"].value = '密码';
        // form.elements['login-button'].click();
        // console.log(document.title);
        return document.title;
    });
    //setTimeout('print_cookies()',10000)
});

setInterval(function() {
var form = document.getElementById("login-main-form");
        console.log(form);
}, 1000);