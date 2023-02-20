<?php
include_once '../Dao/Favor.php';
if (getLoginId()==false) {
    echo json_encode(array('code'=>-1,'message'=>'请先登录'),JSON_UNESCAPED_UNICODE);
    return ;
}

if (isset($_GET['mid'])) {
    $mid = $_GET['mid'];
    echo json_encode(sumFavorByMid($mid), JSON_UNESCAPED_UNICODE);
    return;
}
if (isset($_GET['uid'])) {
    $mid = $_GET['uid'];
    echo json_encode(sumFavorByUid($mid), JSON_UNESCAPED_UNICODE);
    return;
}
echo json_encode(array('code' => -3, 'message' => 'arguments error!'), JSON_UNESCAPED_UNICODE);
