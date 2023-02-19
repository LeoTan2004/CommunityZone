<?php
require_once 'Connect.php';
function getUserById($uid)
{
    $con = getConnection();
    static $stmt;
    if (!($stmt instanceof mysqli_stmt)) {
        $stmt = $con->prepare("SELECT user_id, email, nickname, signature, statue FROM users WHERE USER_ID=?");
    }
    if (filter_var($uid, FILTER_VALIDATE_INT)!=false) {
        $stmt->bind_param('i', $uid);
        $stmt->bind_result($user_id, $email, $nickname, $signature, $statue);
        $stmt->execute();
        if ($stmt->fetch()) {
            return ['uid' => $user_id, 'email' => $email, 'nickname' => $nickname, 'signature' => $signature, 'statue' => $statue];
        }
    }
    return null;
}

function getUserByIdPWD($uid, $pwd): bool
{
    $con = getConnection();
    static $stmt;
    if (!($stmt instanceof mysqli_stmt)) {
        $stmt = $con->prepare("SELECT USER_ID FROM users WHERE USER_ID=? and PASSWORD=?");
    }
    $var1 = filter_var($uid, FILTER_VALIDATE_INT);
    if ($var1) {
        $stmt->bind_param('is', $var1, $pwd);
        $stmt->bind_result($user_id);
        $stmt->execute();
        if ($stmt->fetch()) {
            return $user_id == $uid;
        }
    }
    return false;
}

function getUserByEmail($email): ?array
{
    $con = getConnection();
    static $stmt;
    if (!($stmt instanceof mysqli_stmt)) {
        $stmt = $con->prepare("SELECT user_id, email, nickname, signature, statue FROM users WHERE EMAIL=?");
    }
    $filter_id = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($filter_id) {
        $stmt->bind_param('s', $filter_id);
        $stmt->bind_result($user_id, $email, $nickname, $signature, $statue);
        $stmt->execute();
        if ($stmt->fetch()) {
            return array('uid' => $user_id, 'email' => $email, 'nickname' => $nickname, 'signature' => $signature, 'statue' => $statue);
        }
    }
    return null;

}

session_start();
