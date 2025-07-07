<?php

abstract class BaseModel
{
    protected static function conectar_db()
    {
        $conn = new mysqli(
            $_ENV["DB_HOST"],
            $_ENV["DB_USER"],
            $_ENV["DB_PSSW"],
            $_ENV["DB_DATABASE"]
        );
        return $conn;
    }
}
