<?php
require_once 'Utils.php';
include_once 'CheckComment.php';
function addFavor($user_id, $mid)
{
    $con = getConnection();
    static $stmt;
    if (!($stmt instanceof mysqli_stmt)) {
        $stmt = $con->prepare("INSERT INTO favor (uid, mid,uidTo) VALUES (?,?,?)");
    }
    if (!filter_var($mid, FILTER_VALIDATE_INT)) {
        return array('code' => -2, 'message' => '评论id参数错误');
    }
    $m = getCommentByID($mid);
    if (!isset($m['mId'])) {
        return array('code' => -2, 'message' => '评论id参数错误');
    }
    $user = $m['mUserId'];
    $stmt->bind_param('iii', $user_id, $mid, $user);
    cancelFavor($user_id, $mid);
    if ($stmt->execute()) {
        return array('code' => 0, 'message' => '点赞成功');
    }
    return array('code' => -255, 'message' => '操作失败');
}

function cancelFavor($user_id, $mid): array
{
    $con = getConnection();
    static $stmt;
    if (!($stmt instanceof mysqli_stmt)) {
        $stmt = $con->prepare("DELETE FROM favor where mid=? AND uid=?");
    }
    if ((!filter_var($user_id, FILTER_VALIDATE_INT))) {
        return array('code' => -2, 'message' => '用户id参数错误');
    }
    if (!filter_var($mid, FILTER_VALIDATE_INT)) {
        return array('code' => -2, 'message' => '评论id参数错误');
    }
    $stmt->bind_param('ii', $mid, $user_id);
    if ($stmt->execute()) {
        return array('code' => 0, 'message' => '取消成功');
    }
    return array('code' => -255, 'message' => '操作失败');
}

function sumFavorByUid($uid): array
{
    $con = getConnection();
    static $stmt;
    if (!($stmt instanceof mysqli_stmt)) {
        $stmt = $con->prepare("SELECT count(mid) FROM favor where uidTo=?");
    }
    if ((!filter_var($uid, FILTER_VALIDATE_INT))) {
        return array('code' => -2, 'message' => '用户id参数错误');
    }
    $stmt->bind_param('i', $uid);
    $count = 0;
    $stmt->bind_result($count);
    if ($stmt->execute()) {
        $stmt->fetch();
        return array('code' => 0, 'message' => '查询成功', 'date' => $count);
    }
    return array('code' => -255, 'message' => '操作失败');
}

function sumFavorByMid($mid): array
{
    $con = getConnection();
    static $stmt;
    if (!($stmt instanceof mysqli_stmt)) {
        $stmt = $con->prepare("SELECT count(mid) FROM favor where mid=?");
    }
    if ((!filter_var($mid, FILTER_VALIDATE_INT))) {
        return array('code' => -2, 'message' => 'mid参数错误');
    }
    $stmt->bind_param('i', $mid);
    $stmt->bind_result($count);
    if ($stmt->execute()) {
        $stmt->fetch();
        return array('code' => 0, 'message' => '查询成功', 'date' => $count);
    }
    return array('code' => -255, 'message' => '操作失败');
}