<?php

namespace dao\commentDB;

use bean\comment\Comment;
use bean\comment\CommentBean;
use bean\comment\EditableCommentBean;

interface CommentGetter
{
    /**
     * 通过id获取comment对象
     * @return Comment 返回comment对象
     */
    function getterCommentById(string $id):CommentBean;

    /**
     * 通过主题获取comment对象
     * @return Comment 返回comment对象
     */
    function getterCommentsByTheme(string $theme):array|null;
}