<?php

namespace bean\user;

use bean\NullEntity;

class NullUser implements UserBean,NullEntity
{

    public function getUserID(): int
    {
        return -1;
    }

    public function getPassword(): string
    {
        return "";
    }

    public function getEmail(): string
    {
        return "";
    }

    public function getNickName(): string
    {
        return "";
    }

    public function getSignature(): string
    {
        return "";
    }

    public function getStatus(): int
    {
        return -1;
    }
}