<?php

namespace bean\user;


interface UserBean
{

    public function getStatus(): int;

    /**
     * @return int
     */
    public function getUserID(): int;

    /**
     * @return string
     */
    public function getPassword(): string;

    /**
     * @return string
     */
    public function getEmail(): string;

    /**
     * @return string
     */
    public function getNickName(): string;

    /**
     * @return string
     */
    public function getSignature(): string;
}