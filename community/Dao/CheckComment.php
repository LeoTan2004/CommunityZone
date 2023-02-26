<?php
require_once 'Utils.php';

function getCommentByContent($content, $limit, $offset): array
{
    $con = getConnection();
    static $stmt;
    if (!($stmt instanceof mysqli_stmt)) {
        $stmt = $con->prepare("SELECT M_ID, M_TIME, M_USERID, M_theme, M_content, M_RID FROM comment WHERE M_content LIKE ? limit ? offset ? ");
    }
    if (($content === '')) {
        return array();
    }
    $content = '%' . $content . '%';
    $stmt->bind_result($M_ID, $M_TIME, $M_USERID, $M_theme, $M_content, $M_RID);
    $stmt->bind_param('sii', $content, $limit, $offset);
    $results = array();
    $stmt->execute();
    while ($stmt->fetch()) {
        $results[] = array('mId' => $M_ID, 'mTime' => timestampToDate($M_TIME), 'mUserId' => $M_USERID, 'mTheme' => $M_theme, 'mContent' => $M_content, 'mRid' => $M_RID);
    }
    return $results;
}


function getCommentByUserID($user_id, $limit, $offset): array
{
    $con = getConnection();
    static $stmt;
    if (!($stmt instanceof mysqli_stmt)) {
        $stmt = $con->prepare("SELECT M_ID, M_TIME, M_USERID, M_theme, M_content, M_RID FROM comment WHERE M_USERID = ? order by M_ID DESC  limit ? offset ?");
    }
    $stmt->bind_result($M_ID, $M_TIME, $M_USERID, $M_theme, $M_content, $M_RID);
    $results = array();
    $stmt->bind_param('iii', $user_id, $limit, $offset);
    $stmt->execute();
    while ($stmt->fetch()) {
        $results[] = array('mId' => $M_ID, 'mTime' => timestampToDate($M_TIME), 'mUserId' => $M_USERID, 'mTheme' => $M_theme, 'mContent' => $M_content, 'mRid' => $M_RID);
    }

    return $results;
}

function getCommentByTheme($theme, $limit, $offset): array
{
    $con = getConnection();
    static $stmt;
    if (!($stmt instanceof mysqli_stmt)) {
        $stmt = $con->prepare("SELECT M_ID, M_TIME, M_USERID, M_theme, M_content, M_RID FROM comment WHERE M_theme=? order by M_ID DESC limit ? offset ?");
    }
    $stmt->bind_result($M_ID, $M_TIME, $M_USERID, $M_theme, $M_content, $M_RID);
    $stmt->bind_param('sii', $theme, $limit, $offset);
    $results = array();
    $stmt->execute();
    while ($stmt->fetch()) {
        $results[] = array('mId' => $M_ID, 'mTime' => timestampToDate($M_TIME), 'mUserId' => $M_USERID, 'mTheme' => $M_theme, 'mContent' => $M_content, 'mRid' => $M_RID);
    }
    return $results;
}

function getCommentByID($id): array
{
    $con = getConnection();
    static $stmt;
    if (!($stmt instanceof mysqli_stmt)) {
        $stmt = $con->prepare("SELECT M_ID, M_TIME, M_USERID, M_theme, M_content, M_RID FROM comment WHERE M_ID=?");
    }
    $stmt->bind_result($M_ID, $M_TIME, $M_USERID, $M_theme, $M_content, $M_RID);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->fetch();

    return array('mId' => $M_ID, 'mTime' => timestampToDate($M_TIME), 'mUserId' => $M_USERID, 'mTheme' => $M_theme, 'mContent' => $M_content, 'mRid' => $M_RID);
}
