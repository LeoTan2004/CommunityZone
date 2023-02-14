<?php

namespace dao\impl;

use bean\user\EditableUserBean;
use bean\user\NullUser;
use bean\user\User;
use dao\userDB;
use globe\TAGS;
use mysqli;
use mysqli_stmt;

class UserDBConn implements userDB\UserGetterWithUID, userDB\UserModifier, userDB\UserAdder, userDB\UserCheck, userDB\UserGetterWithEMail
{
    private mysqli $mysql_conn;
    private mysqli_stmt $adder;
    private mysqli_stmt $getterWithUID;
    private mysqli_stmt $getterWithEMail;
    private mysqli_stmt $modifier;
    private mysqli_stmt $checker;

    public function __construct(string $host,string $username,string $passsword,int $port,string $DBname){
        $this->mysql_conn = mysqli_connect($host,$username,$passsword,$DBname,$port);
        $this->adder = $this->mysql_conn->prepare("insert into communityzone.users values (?,?,?,?,?,0)");
        $this->getterWithUID = $this->mysql_conn->prepare("select USER_ID,EMAIL,NICKNAME,SIGNATURE,STATUE from communityzone.users where USER_ID=?");
        $this->checker = $this->mysql_conn->prepare("select * from communityzone.users where USER_ID=? and PASSWORD=?");
        $this->modifier = $this->mysql_conn->prepare("update communityzone.users set PASSWORD=?,EMAIL=?,NICKNAME=?,SIGNATURE=?,STATUE=? where USER_ID=? ");
        $this->getterWithEMail = $this->mysql_conn->prepare("select USER_ID,EMAIL,NICKNAME,SIGNATURE,STATUE from communityzone.users where EMAIL=?");
    }
    public function addUser(User $user)
    {
        $id =  $user->getUserID();
        $password = $user->getPassword();
        $email = $user->getEmail();
        $nickname = $user->getNickName();
        $signature = $user->getSignature();
        $this->adder->execute([$id,$password,$email,$nickname,$signature]);
    }

    public function getUserByUID(int $id) : EditableUserBean
    {
        $this->getterWithUID->bind_result($uid,$email,$nickname,$signature);
        $this->getterWithUID->execute([$id]);
        if ($this->getterWithUID->fetch()) {
            return new User($uid,"",$email,$nickname,$signature);
        }
        return new NullUser();
    }
    public function getUserByEMail(string $eMail) : User
    {
        $this->getterWithEMail->bind_result($uid,$pwd,$email,$nickname,$signature);
        $this->getterWithEMail->execute([$email]);
        if ($this->getterWithEMail->fetch()) {
            return new User($uid,"",$email,$nickname,$signature);
        }
        return new NullUser();
    }

    public function modifyUser(User $user)
    {
        $id =  $user->getUserID();
        $password = $user->getPassword();
        $email = $user->getEmail();
        $nickname = $user->getNickName();
        $signature = $user->getSignature();
        $status = $user->getStatus();
        $this->modifier->execute([$password,$email,$nickname,$signature,$status,$id]);
    }

    function checkUser(int $userID, string $password):bool
    {
        $this->checker->execute([$userID,$password]);
        if ($this->checker->fetch()){
            return true;
        }else{
            return false;
        }
    }

}