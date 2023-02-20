<?php
require_once 'Connect.php';
function modifyCommentRid($mid, $rid): array
{
    $con = getConnection();
    static $stmt;
    if (!($stmt instanceof mysqli_stmt)) {
        $stmt = $con->prepare("UPDATE comment SET M_RID=? where M_ID=?");
    }
    if (!filter_var($mid, FILTER_VALIDATE_INT)) {
        return array(-2, 'id指向错误');
    }
    if (!(filter_var($rid, FILTER_VALIDATE_INT))) {
        return array(-2, '参数错误');
    }
    $stmt->bind_param('ii', $rid, $mid);
    if ($stmt->execute()) {
        return array(0, '更改成功,评论' . $mid . '的rid为' . $rid);
    }
    return array(-1, '更改失败,未知错误');
}
