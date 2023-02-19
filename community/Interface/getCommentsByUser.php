<?php

include_once '../Dao/CheckComment.php';
include_once 'session/loginInfo.php';
if (getLoginId()==false) {
    echo json_encode(array('code'=>-1,'message'=>'请先登录'),JSON_UNESCAPED_UNICODE);
    return ;
}

if (!isset($_GET['user_id'])){
    echo json_encode(array('code' => -1, 'message' => '找不到用户'), JSON_UNESCAPED_UNICODE);
    return ;
}
$offset = 0;
if (isset($_GET['offset'])||filter_var($_GET['offset'],FILTER_VALIDATE_INT)){
    $offset = $_GET['offset'];
}
echo json_encode(getCommentByUserID($_GET['user_id'],50,$offset), JSON_UNESCAPED_UNICODE);
