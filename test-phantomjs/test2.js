"use strict";
var page = require('webpage').create();
console.log('The default user agent is ' + page.settings.userAgent);
page.settings.userAgent = 'SpecialAgent';
page.open('http://www.baidu.com', function (status) {
    if (status !== 'success') {
        console.log('Unable to access network');
    } else {
       // console.log(page.content);
        var ua = page.evaluate(function () {
            console.log(4444);
           // return document.getElementById('myagent').innerText;
        });
        console.log(ua);
    }
    phantom.exit();
});
