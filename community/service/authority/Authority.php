<?php

namespace service\authority;

abstract class Authority
{
    public final static function getAuthority():int
    {
        if ($_SESSION['userID']!=null) {
            return $_SESSION['userID'];
        }else{
            return -1;
        }
    }

    public abstract function setAuthority(string $arg1,string $arg2);
}