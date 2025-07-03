<?php

class ContactoModel
{
    private static function conectar_db()
    {
        $conn = new mysqli("localhost", "root", "12345678", "app_contactos");
        return $conn;
    }
    public static function crear($nombre, $numero)
    {
        $conn = self::conectar_db();
        $stmt = $conn->prepare(
            "INSERT INTO contactos (nombre, numero) VALUES (?, ?)"
        );
        $stmt->bind_param("ss", $nombre, $numero);
        $stmt->execute();
        return $stmt->affected_rows;
    }
    public static function obtenerTodos()
    {
        $conn = self::conectar_db();
        $result = $conn->query("SELECT * FROM contactos");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public static function borrar($id)
    {
        $conn = self::conectar_db();
        $stmt = $conn->prepare("DELETE FROM contactos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->affected_rows;
    }
    public static function obtenerById($id)
    {
        $conn = self::conectar_db();
        $stmt = $conn->prepare("SELECT * FROM contactos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    public static function editar($id, $nombre, $numero)
    {
        $conn = self::conectar_db();
        $stmt = $conn->prepare(
            "UPDATE contactos SET nombre = ?, numero = ? WHERE id = ?"
        );
        $stmt->bind_param("ssi", $nombre, $numero, $id);
        $stmt->execute();
        return $stmt->affected_rows;
    }
}
