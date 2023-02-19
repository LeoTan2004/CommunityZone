<?php
include_once 'Connect.php';
function addFavor($user_id, $mid)
{
    $con = getConnection();
    static $stmt;
    if (!($stmt instanceof mysqli_stmt)) {
        $stmt = $con->prepare("INSERT INTO favor (uid, mid) VALUES (?,?)");
    }

    if ((!filter_var($user_id, FILTER_VALIDATE_INT))) {
        return array(-2, '用户id参数错误');
    }
    if (!filter_var($mid, FILTER_VALIDATE_INT)) {
        return array(-2, '评论id参数错误');
    }
    $stmt->bind_param('ii', $user_id,$mid);
    if ($stmt->execute()) {
        return array(0, '点赞成功' );
    }
    return array(-255,'操作失败');
}

function cancelFavor($user_id, $mid)
{
    $con = getConnection();
    static $stmt;
    if (!($stmt instanceof mysqli_stmt)) {
        $stmt = $con->prepare("DELETE FROM favor where mid=? AND uid=?");
    }
    if ((!filter_var($user_id, FILTER_VALIDATE_INT))) {
        return array(-2, '用户id参数错误');
    }
    if (!filter_var($mid, FILTER_VALIDATE_INT)) {
        return array(-2, '评论id参数错误');
    }
    $stmt->bind_param('ii', $user_id,$mid);
    if ($stmt->execute()) {
        return array(0, '取消成功' );
    }
    return array(-255,'操作失败');
}