<?php
include_once '../Dao/CheckComment.php';
include_once 'session/loginInfo.php';
if (getLoginId()==false) {
    echo json_encode(array('code'=>-1,'message'=>'请先登录'),JSON_UNESCAPED_UNICODE);
    return ;
}

if (!isset($_GET['content'])||trim($_GET['content'])==''){
    echo json_encode(array('code' => -1, 'message' => '搜索为空'), JSON_UNESCAPED_UNICODE);
    return ;
}
$offset = 0;
if (isset($_GET['offset'])||filter_var($_GET['offset'],FILTER_VALIDATE_INT)!=false){
    $offset = $_GET['offset'];
}
echo json_encode(getCommentByContent(trim($_GET['content']),50,$offset), JSON_UNESCAPED_UNICODE);
