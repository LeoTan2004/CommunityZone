<?php
include_once '../Dao/CheckUser.php';
include_once './session/loginInfo.php';
session_start();
if (!(isset($_POST['username']) && isset($_POST['password']))){
    return json_encode(array(-1,'arguments error!'));
}
$username =  trim($_POST['username']);//用户名
if (!filter_var($username,FILTER_VALIDATE_INT))return json_encode(array(-2,'username invalid!'));
$password = trim($_POST['password']);//密码
if (strlen($password)<6)return json_encode(array(-2,'password invalid!'));
if (getUserByIdPWD($username,$password)) {
    setLoginId($username);
    return array(0,'登录成功');
}else{
    return array(-1,'登录失败');
}
