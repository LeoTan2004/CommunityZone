<?php

namespace dao\userDB;

use bean\user\User;

interface UserAdder
{
    /**
     * 添加用户
     * @param User $user 用户对象
     * @return mixed
     */
    function addUser(User $user);
}