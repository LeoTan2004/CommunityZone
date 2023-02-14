<?php

namespace dao\userDB;

use bean\user\User;

interface UserGetterWithEMail
{
    function getUserByEMail(string $eMail):User|null;
}