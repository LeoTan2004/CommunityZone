<?php
require_once '../Dao/CreateUser.php';

if (!(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']))) {
    echo json_encode(array('code' => -1, 'message' => 'arguments error!'), JSON_UNESCAPED_UNICODE);;
    return;
}
$username = trim($_POST['username']);//用户名
if (!filter_var($username, FILTER_VALIDATE_INT)){
    echo json_encode(array('code' => -2, 'message' => 'username invalid!'), JSON_UNESCAPED_UNICODE);
    return;
}
$password = trim($_POST['password']);//密码
if (strlen($password) < 6) {
    echo json_encode(array('code' => -2, 'message' => 'password invalid!'), JSON_UNESCAPED_UNICODE);
    return;
}
$email = trim($_POST['email']);//邮箱
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(array('code' => -2, 'message' => 'email invalid!'), JSON_UNESCAPED_UNICODE);
    return;
}
$signature = trim($_POST['signature']);//个性签名
$nickname = trim($_POST['nickname']);//昵称
createUser($username, $password, $email, $nickname, $signature);
echo json_encode(array('code' => 0, 'message' => '注册成功'), JSON_UNESCAPED_UNICODE);
return;

