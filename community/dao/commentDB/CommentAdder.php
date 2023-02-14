<?php

namespace dao\commentDB;

use bean\comment\Comment;

interface CommentAdder
{
    /**
     * @param Comment $comment 添加评论
     * @return mixed
     */
    function addComment(Comment $comment);
}