<?php

namespace dao\impl;

use bean\comment\Comment;
use bean\comment\CommentBean;
use bean\comment\EditableCommentBean;
use bean\comment\NullComment;
use mysqli;
use mysqli_stmt;

class CommentDBConn implements \dao\commentDB\CommentAdder, \dao\commentDB\CommentGetter, \dao\commentDB\CommentModifier
{
    private mysqli $mysql_conn;
    private mysqli_stmt $commentAdder;
    private mysqli_stmt $commentGetter_ID;
    private mysqli_stmt $commentModifier;
    private mysqli_stmt $commentGetter_Theme;


    public function __construct(string $host,string $username,string $passsword,int $port,string $DBname)
    {
        $this->mysql_conn = mysqli_connect($host,$username,$passsword,$DBname,$port);
        $this->commentAdder = $this->mysql_conn->prepare('insert into user_message values (?,?,?,?,?,?)');
        $this->commentGetter_ID = $this->mysql_conn->prepare('select * from user_message where user_message.M_ID = ?');
        $this->commentModifier = $this->mysql_conn->prepare('update user_message set M_TIME=?,M_theme=?,M_content=?,M_RID=? where M_ID = ?');
        $this->commentGetter_Theme =$this->mysql_conn->prepare('select * from user_message where user_message.M_theme = ?');
    }


    /**
     * @inheritDoc
     */
    function addComment(Comment $comment)
    {
        $id = $comment->getMID();
        $time = $comment->getMTime();
        $userID= $comment->getMUserID();
        $theme = $comment->getMTheme();
        $content = $comment->getMContent();
        $rid = $comment->getMRid();
        $this->commentAdder->execute([$id,$time,$userID,$theme,$content,$rid]);
    }

    function getterCommentById(string $id): CommentBean
    {
        $this->commentGetter_ID->bind_result($mid,$time,$userID,$theme,$content,$rid);
        $this->commentGetter_ID->execute([$id]);
        if ($this->commentGetter_ID->fetch()) {
            $comment = new Comment($mid,$time,$userID,$theme,$content,$rid);
            return $comment;
        }
        return new NullComment();
    }

    function getterCommentsByTheme(string $theme): array|null
    {
        $comments = array();
        $this->commentGetter_Theme->bind_result($mid,$time,$userID,$theme,$content,$rid);
        $this->commentGetter_Theme->execute([$theme]);
        while ($this->commentGetter_Theme->fetch()){
            $comment = new Comment($mid,$time,$userID,$theme,$content,$rid);
            $comments[] = $comment;
        }
        return $comments;
    }

    function modifyComment(Comment $comment)
    {
        $id = $comment->getMID();
        $time = $comment->getMTime();
        $theme = $comment->getMTheme();
        $content = $comment->getMContent();
        $rid = $comment->getMRid();
        $this->commentModifier->execute([$time,$theme,$content,$rid,$id]);
    }
}