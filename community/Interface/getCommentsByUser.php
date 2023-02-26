<?php

include_once '../Dao/CheckComment.php';
include_once 'session/loginInfo.php';
if (checkLogin()){
    if (!isset($_GET['user_id'])){
        echo json_encode(array('code' => -3, 'message' => 'arguments error!'), JSON_UNESCAPED_UNICODE);
        return ;
    }
    $offset = 0;
    if (isset($_GET['offset'])||filter_var($_GET['offset'],FILTER_VALIDATE_INT)){
        $offset = $_GET['offset'];
    }
    echo json_encode(array('code' => -0, 'message' => 'successful','date'=>getCommentByUserID($_GET['user_id'],50,$offset)), JSON_UNESCAPED_UNICODE);

}

