function getCurUserInfo(callback) {
    let xmlhttp = getAjax();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            da = xmlhttp.responseText;
            daobj = JSON.parse(da);
            if (daobj['code'] === 0) {
                callback(daobj['date']);
            }
        }
    }
    xmlhttp.open("GET", "../interface/getCurrentUserInfo.php", true);//url
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();//datebody
}