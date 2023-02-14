<?php

namespace service\store\container\sql;

use bean\comment\NullComment;
use bean\user\EditableUserBean;
use bean\user\NullUser;
use bean\user\UserBean;
use dao\impl\UserDBConn;
use globe\config\Config;
use service\store\Container;

class UserDao implements Container
{
    private UserDBConn $DBConn;

    public function __construct()
    {
        $this->DBConn = new UserDBConn(Config::getHostName(),Config::getUserName(),Config::getPassword(),Config::getPort(),Config::getDBname());
    }

    function get($key)
    {
        $user =  $this->DBConn->getUserByUID(intval($key));
        if ($user->getStatus()==-1) {
            return new NullComment();
        }
        return $user;
    }

    function put($key,$value):bool
    {
        if ($value instanceof NullUser){
            return false;
        }
        if ($value instanceof UserBean){
            if ($key!=$value->getUserID()){
                return false;
            }else if($this->get($key) instanceof NullUser){
                $this->DBConn->addUser($value);
                return true;//表内原本无对象,添加对象
            }else{
                $this->DBConn->modifyUser($value);
                return true;//表内已有对象,更改对象.
            }
        }
        return false;

    }

    function del($key):bool
    {
        $u = $this->get($key);
        if ($u instanceof EditableUserBean){
            $u->setStatus(-1);//删除的设置
            $this->DBConn->modifyUser($u);
            return true;
        }
        return false;
    }
}