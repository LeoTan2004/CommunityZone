<?php

namespace bean\user;

interface EditableUserBean extends UserBean
{
    /**
     * @param string $password
     */
    public function setPassword(string $password): void;

    /**
     * @param string $email
     */
    public function setEmail(string $email): void;

    /**
     * @param string $nickName
     */
    public function setNickName(string $nickName): void;

    /**
     * @param string $signature
     */
    public function setSignature(string $signature): void;

    public function setStatus(int $status);


}