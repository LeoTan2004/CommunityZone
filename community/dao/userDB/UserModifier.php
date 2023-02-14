<?php

namespace dao\userDB;

use bean\user\User;

interface UserModifier
{
    /**
     * 修改用户信息，根据User中的id寻找数据库中的信息
     * @param User $user 要修改成的用户信息
     * @return mixed
     */
    function modifyUser(User $user);

}