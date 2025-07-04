<?php

abstract class BaseModel
{
    protected static function conectar_db()
    {
        $conn = new mysqli(
            "localhost",
            "root",
            "12345678",
            "app_contactos_develop"
        );
        return $conn;
    }
}
