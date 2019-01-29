function getRem(ratio) {
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
