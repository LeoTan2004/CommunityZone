<?php

namespace service\authority;

use dao\userDB\UserCheck;

class UPAuthority extends Authority
{
    private static Authority $authority;
    private UserCheck $check;

    /**
     * @param string $name 用户名，这里使用了强制转化，转换成int
     * @param string $password 密码
     * @return void
     */
    public function setAuthority(string $name, string $password)
    {
        if ($this->check->checkUser(intval($name),$password)){
            $_SESSION['userID']=intval($name);
        }
    }

    /**
     * @param UserCheck $check
     */
    public function setCheck(UserCheck $check): void
    {
        $this->check = $check;
    }

    private function __construction(){
    }

    public static function getInstance(): Authority
    {
        if (self::$authority==null){
            self::$authority = new UPAuthority();
        }
        return self::$authority;
    }
}