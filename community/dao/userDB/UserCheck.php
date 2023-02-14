<?php

namespace dao\userDB;

interface UserCheck
{
    function checkUser(int $userID,string $password):bool;
}