<?php

namespace dao\commentDB;

use bean\comment\Comment;

interface CommentModifier
{
    /**
     * 修改评论信息，根据Comment中的id寻找数据库中的信息
     * @param Comment $comment 要修改的评论信息
     * @return mixed
     */
    function modifyComment(Comment $comment);
}