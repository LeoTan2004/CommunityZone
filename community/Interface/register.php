<?php
require_once '../Dao/CreateUser.php';

if (!(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']))) {
    return json_encode(array(-1, 'arguments error!'));
}
$username = trim($_POST['username']);//用户名
if (!filter_var($username, FILTER_VALIDATE_INT)) return json_encode(array(-2, 'username invalid!'));
$password = trim($_POST['password']);//密码
if (strlen($password) < 6) return json_encode(array(-2, 'password invalid!'));
$email = trim($_POST['email']);//邮箱
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return json_encode(array(-2, 'email invalid!'));
$signature = trim($_POST['signature']);//个性签名
$nickname = trim($_POST['nickname']);//昵称
var_dump(createUser($username, $password, $email, $nickname, $signature));

