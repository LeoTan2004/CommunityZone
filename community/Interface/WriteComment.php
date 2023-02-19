<?php
include_once '../Dao/CheckUser.php';
include_once '../Dao/CreateComment.php';
include_once 'session/loginInfo.php';
$user = getLoginId();
if (getUserById($user)==null){
    return array(-3,'请先登录');
}
if (!isset($_POST['content'])||!isset($_POST['theme'])){
    return array(-1,'arguments error');
}
$theme = trim($_POST['theme']);
$content = trim($_POST['content']);
if ($theme==''){
    return array(-2,'请填写主题');
}
if ($content==''){
    return array(-2,'请填写内容');
}
$rid = 0;
if (isset($_POST['rid'])){
    $rid = $_POST['rid'];
}
createComment($user,$theme,$rid,$content);
