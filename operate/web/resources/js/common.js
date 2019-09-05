document.write("<link href='/resources/css/reset.css' rel='stylesheet'>");
document.write("<link href='/resources/css/common.css' rel='stylesheet'>");
document.write("<link href='/resources/css/font-awesome.min.css' rel='stylesheet'>");
document.write("<script src='/resources/js/jquery-3.3.1.min.js' type='text/javascript' charset='utf-8'></script>");
document.write("<script src='/resources/js/layer/layer.min.js' type='text/javascript' charset='utf-8'></script>");

var rem = document.documentElement.getBoundingClientRect().width * 0.1;
document.documentElement.style.fontSize = rem + "px";

load(function () {
    $('.jump').click(function () {
        if ($(this).attr('url')) {
            window.location.href = $(this).attr('url');
        }
    });
});

function load(func) {
    var oldLoad = window.onload;
    if (typeof window.onload !== 'function') {
        window.onload = func;

    }
    else {
        window.onload = function () {
            oldLoad();
            func();
        }
    }
}

function getParams(name, def) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
    var re = window.location.search.substr(1).match(reg);
    if (re !== null) {
        return decodeURI(re[2]);
    }
    if (def) {
        return def;
    }
    return null;
}

function postCall(url, params, target) {
    var form = document.createElement("form");
    form.style.display = "none";
    form.action = url || '';
    form.method = "post";
    form.target = target || '_self';
    var opt;
    for (var x in params) {
        opt = document.createElement("input");
        opt.name = x;
        opt.value = params[x];
        form.appendChild(opt);
    }
    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form);
}

