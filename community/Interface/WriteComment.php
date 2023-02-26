<?php
include_once '../Dao/CheckUser.php';
include_once '../Dao/CreateComment.php';
include_once 'session/loginInfo.php';
if (checkLogin()){
    if (!isset($_POST['content'])||!isset($_POST['theme'])){
        echo json_encode(array('code' => -3, 'message' => 'arguments error!'),JSON_UNESCAPED_UNICODE);
        return ;
    }
    $theme = trim($_POST['theme']);
    $content = trim($_POST['content']);
    if ($theme==''){
        echo json_encode(array('code' => -2, 'message' => '请填写主题'),JSON_UNESCAPED_UNICODE);
        return ;
    }
    if ($content==''){
        echo json_encode(array('code' => -2, 'message' => '请填写内容'),JSON_UNESCAPED_UNICODE);
        return ;
    }
    $rid = 0;
    if (isset($_POST['rid'])){
        $rid = $_POST['rid'];
    }
    $user = getLoginId();
    createComment($user,$theme,$rid,$content);
    echo json_encode(array('code' => 0, 'message' => '添加成功'),JSON_UNESCAPED_UNICODE);
    return ;
}

