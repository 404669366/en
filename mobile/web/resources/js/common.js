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
