function getAjax() {
    var xmlhttp;
    if (window.XMLHttpRequest) {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp = new XMLHttpRequest();
    } else {
        // IE6, IE5 浏览器执行代码
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return xmlhttp;
}

function timestampToTime(timestamp) {
    let date = new Date(timestamp);
    return formatDate(date,"Y年M月D日");
}

function formatDate(date, format) {
    if (date instanceof Date) {
        var Y = date.getFullYear().toString();
        var M = date.getMonth().toString();
        var D = date.getDate().toString();
        var h = date.getHours();
        var m = date.getMinutes();
        var s = date.getSeconds();
        var result = "";
        for (let i = 0; i < format.length; i++) {
            switch (format[i]) {
                case "Y":
                    result = result + Y;
                    break;
                case 'M':
                    result = result + M;
                    break;
                case 'D':
                    result = result + D;
                    break;
                case 'h':
                    result = result + h;
                    break;
                case 'm':
                    result = result + m;
                    break;
                case 's':
                    result = result + s;
                    break;
                default:
                    result = result + format[i];
            }
        }
        return result;
    }

}