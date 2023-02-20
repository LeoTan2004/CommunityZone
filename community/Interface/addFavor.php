<?php
include_once 'session/loginInfo.php';
include_once '../Dao/Favor.php';
if (getLoginId()==false) {
    echo json_encode(array('code' => -1, 'message' => '请先登录'), JSON_UNESCAPED_UNICODE);
    return;
}
if (!isset($_POST['mid']) && trim($_POST['mid']) == '') {
    echo json_encode(array('code' => -3, 'message' => 'arguments error!'), JSON_UNESCAPED_UNICODE);
    return;
}
$user = getLoginId();
$mid = $_POST['mid'];
echo json_encode(addFavor($user, $mid), JSON_UNESCAPED_UNICODE);

