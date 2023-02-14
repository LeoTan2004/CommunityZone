<?php

namespace globe\config;

class Config
{
    private static string $hostName = "localhost";
    private static string $userName = "root";
    private static string $password = "root";
    private static int $port = 3306;
    private static string $DBname = "communityzone";


    /**
     * @return string
     */
    public static function getPassword(): string
    {
        return self::$password;
    }
    /**
     * @return string
     */
    public static function getDBname(): string
    {
        return self::$DBname;
    }

    /**
     * @return string
     */
    public static function getHostName(): string
    {
        return self::$hostName;
    }

    /**
     * @return int
     */
    public static function getPort(): int
    {
        return self::$port;
    }

    /**
     * @return string
     */
    public static function getUserName(): string
    {
        return self::$userName;
    }
}