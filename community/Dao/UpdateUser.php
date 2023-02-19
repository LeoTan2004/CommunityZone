<?php
require_once 'Connect.php';
require_once 'CheckUser.php';
function modifyUser($user_id, $email, $nickname, $signature): array
{
    $con = getConnection();
    static $stmt;
    if (!($stmt instanceof mysqli_stmt)) {
        $stmt = $con->prepare("UPDATE users SET EMAIL=?,NICKNAME=?,SIGNATURE=? where USER_ID=?");
    }
    if (!filter_var($user_id, FILTER_VALIDATE_INT) || null == getUserById($user_id)) {
        return array(-1, '找不到该用户');
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || getUserByEmail($email) != null) {
        return array(-2, '邮箱已被占用');
    }
    $stmt->bind_param('sssi', $email, $nickname, $signature, $user_id);
    $stmt->execute();
    return array(0, '成功修改');
}


function modifyPassword($user_id, $password): array
{
    $con = getConnection();
    static $stmt;
    if (!($stmt instanceof mysqli_stmt)) {
        $stmt = $con->prepare("UPDATE users SET PASSWORD=? where USER_ID=?");
    }
    if (!filter_var($user_id, FILTER_VALIDATE_INT) || null == getUserById($user_id)) {
        return array(-1, '找不到该用户');
    }
    $stmt->bind_param('si', $password, $user_id);
    $stmt->execute();
    return array(0, '修改成功');


}
