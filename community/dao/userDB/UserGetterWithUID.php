<?php

namespace dao\userDB;

use bean\user\EditableUserBean;
use bean\user\User;

interface UserGetterWithUID
{
    /**
     * 获取用户
     * @param int $id 账号,这里必须要求64位，32位不支持
     * @return User 返回用户对象，但是其中的数据可能为空
     */
    function getUserByUID(int $id):EditableUserBean;

}