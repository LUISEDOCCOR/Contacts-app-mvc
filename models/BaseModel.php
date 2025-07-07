<?php

abstract class BaseModel
{
    protected static function conectar_db()
    {
        $conn = new mysqli(
            $_ENV["MYSQLHOST"],
            $_ENV["MYSQLUSER"],
            $_ENV["MYSQLPASSWORD"],
            $_ENV["MYSQL_DATABASE"],
            $_ENV["MYSQLPORT"]
        );
        return $conn;
    }
}
