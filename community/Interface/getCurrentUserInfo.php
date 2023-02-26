<?php
include_once 'session/loginInfo.php';
include_once '../Dao/CheckUser.php';
if (checkLogin()) {
    $id = getLoginId();
    $user = getUserById($id);
    echo json_encode(array('code' => 0, 'message' => '查询成功', 'date' => $user), JSON_UNESCAPED_UNICODE);
}
