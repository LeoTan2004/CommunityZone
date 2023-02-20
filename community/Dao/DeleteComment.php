<?php

require_once 'Connect.php';
function deleteComment($mid): array
{
    $con = getConnection();
    static $stmt;
    if (!($stmt instanceof mysqli_stmt)) {
        $stmt = $con->prepare("DELETE FROM comment where M_ID=?");
    }
    if (!(filter_var($mid, FILTER_VALIDATE_INT))) {
        return array(-2, 'id指向错误');
    }
    $stmt->bind_param('i', $mid);
    if ($stmt->execute()) {
        return array(0, '成功删除mid为' . $mid . '的评论');
    }
    return array(-255, '删除失败');
}
