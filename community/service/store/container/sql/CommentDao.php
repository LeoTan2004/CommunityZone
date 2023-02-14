<?php

namespace service\store\container\sql;

use bean\comment\CommentBean;
use bean\comment\EditableCommentBean;
use bean\comment\NullComment;
use bean\user\EditableUserBean;
use dao\impl\CommentDBConn;
use globe\config\Config;
use service\store\Container;

/**
 * 这个类是直接对数据库进行操作的,因此在使用是尽量街上使用,可以设置一个二级缓存用来存储一些数据库中未改变的数据
 */
class CommentDao implements Container
{
    private CommentDBConn $DBConn;

    public function __construct()
    {
        $this->DBConn = new CommentDBConn(Config::getHostName(),Config::getUserName(),Config::getPassword(),Config::getPort(),Config::getDBname());
    }

    function get($key)
    {
        $comment =  $this->DBConn->getterCommentById(intval($key));
        if ($comment->getStatus()==-1) {
            return new NullComment();
        }
        return $comment;
    }

    function put($key,$value): bool
    {
        if ($value instanceof NullComment){
            return false;
        }
        if ($value instanceof CommentBean){
            if ($key!=$value->getMID()){
                return false;
            }else if($this->get($key) instanceof NullComment){
                    $this->DBConn->addComment($value);
                    return true;//表内原本无对象,添加对象
            }else{
                $this->DBConn->modifyComment($value);
                return true;//表内已有对象,更改对象.
            }
        }
        return false;

    }

    function del($key): bool
    {
        $u = $this->get($key);
        if ($u instanceof EditableCommentBean){
            $u->setStatus(-1);
            $this->DBConn->modifyComment($u);
            return true;
        }
        return false;
    }
}