<?php
require_once 'Connect.php';

function getCommentByContent($content): array
{
    $con = getConnection();
    static $stmt;
    if (!($stmt instanceof mysqli_stmt)) {
        $stmt = $con->prepare("SELECT M_ID, M_TIME, M_USERID, M_theme, M_content, M_RID FROM user_message WHERE M_content LIKE ?");
    }
    $stmt->bind_result($M_ID, $M_TIME, $M_USERID, $M_theme, $M_content, $M_RID);
    $stmt->bind_param('s', $content);
    return getResults($stmt, $M_ID, $M_TIME, $M_USERID, $M_theme, $M_content, $M_RID);
}


function getResults(mixed $stmt, mixed $M_ID, mixed $M_TIME, $M_USERID, $M_theme, $M_content, $M_RID): array
{
    $results = array();
    while ($stmt->fetch()) {
        $results[] = array('mId' => $M_ID, 'mTime' => $M_TIME, 'mUserId' => $M_USERID, 'mTheme' => $M_theme, 'mContent' => $M_content, 'mRid' => $M_RID);
    }
    return $results;
}

function getCommentByUserID($user_id): array
{
    $con = getConnection();
    static $stmt;
    if (!($stmt instanceof mysqli_stmt)) {
        $stmt = $con->prepare("SELECT M_ID, M_TIME, M_USERID, M_theme, M_content, M_RID FROM user_message WHERE M_USERID = ?");
    }
    $stmt->bind_result($M_ID, $M_TIME, $M_USERID, $M_theme, $M_content, $M_RID);
    $stmt->bind_param('i', $user_id);
    return getResults($stmt, $M_ID, $M_TIME, $M_USERID, $M_theme, $M_content, $M_RID);
}

function getCommentByTheme($theme): array
{
    $con = getConnection();
    static $stmt;
    if (!($stmt instanceof mysqli_stmt)) {
        $stmt = $con->prepare("SELECT M_ID, M_TIME, M_USERID, M_theme, M_content, M_RID FROM user_message WHERE M_theme=?");
    }
    $stmt->bind_result($M_ID, $M_TIME, $M_USERID, $M_theme, $M_content, $M_RID);
    $stmt->bind_param('s', $theme);
    return getResults($stmt, $M_ID, $M_TIME, $M_USERID, $M_theme, $M_content, $M_RID);
}
