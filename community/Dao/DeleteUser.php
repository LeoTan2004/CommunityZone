<?php
require_once 'Connect.php';
require_once 'CheckUser.php';
function deleteUser($user_id): array
{
    $con = getConnection();
    static $stmt;
    if (!($stmt instanceof mysqli_stmt)) {
        $stmt = $con->prepare("DELETE FROM users where USER_ID=?");
    }
    if (!filter_var($user_id, FILTER_VALIDATE_INT) || null == getUserById($user_id)) {
        return array(-1, '找不到该用户');
    }
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    return array(0, '删除成功');

}
