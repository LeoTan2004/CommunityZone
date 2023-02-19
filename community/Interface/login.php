<?php
include_once '../Dao/CheckUser.php';
include_once './session/loginInfo.php';
session_start();
if (!(isset($_POST['username']) && isset($_POST['password']))){
    echo json_encode(array('code' => -1, 'message' => 'arguments error!'),JSON_UNESCAPED_UNICODE);
    return;
}
$username =  trim($_POST['username']);//用户名
if (!filter_var($username,FILTER_VALIDATE_INT)) {
    echo json_encode(array(-2,'username invalid!'),JSON_UNESCAPED_UNICODE);
    return;
}
$password = trim($_POST['password']);//密码
if (strlen($password)<6) {
    echo json_encode(array(-2,'password invalid!'),JSON_UNESCAPED_UNICODE);
    return;
}
if (getUserByIdPWD($username,$password)) {
    setLoginId($username);
    echo json_encode(array('code'=>0,'message'=>'登录成功'),JSON_UNESCAPED_UNICODE);
    return ;
}else{
    echo json_encode(array('code' => -1, 'message' => '登录失败'),JSON_UNESCAPED_UNICODE);
    return;
}
