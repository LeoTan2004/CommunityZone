<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
function setLoginId($uid)
{
    if (filter_var($uid, FILTER_VALIDATE_INT)) {
        $_SESSION['user_id'] = $uid;
        return true;
    }
    return false;
}

function clearLoginInfo()
{
    $_SESSION['user_id'] = '';
    unset($_SESSION['user_id']);
}

function getLoginId()
{
    if (isset($_SESSION['user_id'])) {
        return $_SESSION['user_id'];
    }
    return false;
}

function checkLogin(){
    if (getLoginId()==false) {
        echo json_encode(array('code' => -1, 'message' => '请先登录'), JSON_UNESCAPED_UNICODE);
        return false;
    }else{
        return true;
    }
}