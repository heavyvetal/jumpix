<?php

namespace app\Models;

final class PDOProxy
{
    private static $instance;

    public static function getInstance($dsn, $username = null, $passwd = null, $options = null)
    {
        if (self::$instance === null) {
            self::$instance = new \PDO($dsn, $username, $passwd, $options);
        }

        return self::$instance;
    }
}