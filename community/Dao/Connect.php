<?php

function getConnection():mysqli{
    static $DBConfig = array(
        "hostName" => "localhost",
        "userName" => "root",
        "password" => "root",
        "port" => 3306,
        "DBName" => "communityzone"
    );
    $conn  = null;
    if ($conn==null){
        $conn = new mysqli($DBConfig['hostName'],$DBConfig['userName'],$DBConfig['password'],$DBConfig['DBName'],$DBConfig['port']);
    }
    return $conn;
}
