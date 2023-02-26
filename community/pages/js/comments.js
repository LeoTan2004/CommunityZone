function getCommentByTheme(theme,offset,callback) {
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
    xmlhttp.open("GET", "../Interface/getComments.php?theme="+theme+"&"+"offset="+offset, true);//url
    xmlhttp.send();//datebody
}

function getCommentByUser(uid,offset,callback) {
    let ajax = getAjax();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            da = xmlhttp.responseText;
            daobj = JSON.parse(da);
            if (daobj['code'] === 0) {
                callback(daobj['date']);
            }
        }
    }
    xmlhttp.open("GET", "..Interface/getCommentsByUser.php?user_id="+uid+"&offset="+offset, true);//url
    xmlhttp.send();//datebody
}