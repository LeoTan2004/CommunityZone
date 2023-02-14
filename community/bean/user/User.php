<?php

namespace bean\user;
use globe\TAGS;

class User implements EditableUserBean
{

    /**
     * @param int $user_ID
     * @param string $password
     * @param string $email
     * @param string $nickName
     * @param string $signature
     * @param int $status
     */
    public function __construct(int $user_ID, string $password, string $email, string $nickName, string $signature,int $status)
    {
        $this->user_ID = $user_ID;
        $this->password = $password;
        $this->email = $email;
        $this->nickName = $nickName;
        $this->signature = $signature;
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getUserID(): int
    {
        return $this->user_ID;
    }


    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getNickName(): string
    {
        return $this->nickName;
    }

    /**
     * @param string $nickName
     */
    public function setNickName(string $nickName): void
    {
        $this->nickName = $nickName;
    }

    /**
     * @return string
     */
    public function getSignature(): string
    {
        return $this->signature;
    }

    /**
     * @param string $signature
     */
    public function setSignature(string $signature): void
    {
        $this->signature = $signature;
    }

    /**
     * @param int $user_ID
     */
    private int $user_ID;
    private string $password;
    private string $email;
    private string $nickName;
    private string $signature;

    private int $status;

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status=$status;
    }
}