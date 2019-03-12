function getRem(need, ratio) {
    if (need) {
        document.write("<link href='/resources/css/reset.css' rel='stylesheet'>");
        document.write("<link href='/resources/css/common.css' rel='stylesheet'>");
        document.write("<link href='/resources/css/font-awesome.min.css' rel='stylesheet'>");
        document.write("<script src='/resources/js/jquery-3.3.1.min.js' type='text/javascript' charset='utf-8'></script>");
        document.write("<script src='/resources/js/layer/layer.min.js' type='text/javascript' charset='utf-8'></script>");
    }
    var width = document.documentElement.getBoundingClientRect().width;
    var rem = width * (ratio || 0.1);
    document.documentElement.style.fontSize = rem + "px";
}

function getParams(name, def) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
    var re = window.location.search.substr(1).match(reg);
    if (re != null) {
        return decodeURI(re[2]);
    }
    if (def) {
        return def;
    }
    return null;
}

function postCall(url, params, target) {
    var tempform = document.createElement("form");
    tempform.action = url;
    tempform.method = "post";
    tempform.style.display = "none";
    if (target) {
        tempform.target = target;
    }

    for (var x in params) {
        var opt = document.createElement("input");
        opt.name = x;
        opt.value = params[x];
        tempform.appendChild(opt);
    }

    var opt = document.createElement("input");
    opt.type = "submit";
    tempform.appendChild(opt);
    document.body.appendChild(tempform);
    tempform.submit();
    document.body.removeChild(tempform);
}

