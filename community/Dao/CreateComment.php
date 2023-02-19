<?php

include_once 'Connect.php';
include_once 'CheckUser.php';
function createComment($user_id, $m_theme, $m_rid, $content): array
{
    $con = getConnection();
    static $stmt;
    if (!($stmt instanceof mysqli_stmt)) {
        $stmt = $con->prepare("INSERT INTO user_message (M_TIME, M_USERID, M_theme, M_content, M_RID) VALUES (?,?,?,?,?)");
    }
    if ((!(filter_var($user_id, FILTER_VALIDATE_INT)))) {
        return array(-1, '用户id错误');
    }
    $time = time();
    $stmt->bind_param('iissi', $time, $user_id, $m_theme, $content,$m_rid);
    if ($stmt->execute()) {
        return array(0, '添加成功');
    }
    return array(-255, '添加失败');
}
