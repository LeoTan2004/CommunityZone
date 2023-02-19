<?php
require_once 'Connect.php';
require_once 'CheckUser.php';
function createUser($user_id, $password, $email, $nickname, $signature): array
{
    $con = getConnection();
    static $stmt;
    if (!($stmt instanceof mysqli_stmt)) {
        $stmt = $con->prepare("INSERT INTO users (USER_ID, PASSWORD, EMAIL, NICKNAME, SIGNATURE) VALUES (?,?,?,?,?)");
    }
    if ((!filter_var($user_id, FILTER_VALIDATE_INT) || getUserById($user_id) != null)) {
//        var_dump(getUserById($user_id));
        return array(-2, '用户已存在');
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || getUserByEmail($email) != null) {
        return array(-2, '邮箱已被占用');
    }
    $stmt->bind_param('issss', $user_id, $password, $email, $nickname, $signature);
    if ($stmt->execute()) {
        return array(0, '创建成功,用户名:' . $user_id . ';\t邮箱:' . $email);
    }
    return array(-255,'创建失败');
}

