<?php
require_once "BaseModel.php";

class ContactoModel extends BaseModel
{
    public static function crear($nombre, $numero, $usuario_id)
    {
        $conn = self::conectar_db();
        $stmt = $conn->prepare(
            "INSERT INTO contactos (nombre, numero, usuario_id) VALUES (?, ?, ?)"
        );
        $stmt->bind_param("ssi", $nombre, $numero, $usuario_id);
        $stmt->execute();
        return $stmt->affected_rows;
    }
    public static function obtenerTodos($usuario_id)
    {
        $conn = self::conectar_db();
        $stmt = $conn->prepare("SELECT * FROM contactos WHERE usuario_id = ?");
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public static function borrar($id, $usuario_id)
    {
        $conn = self::conectar_db();
        $stmt = $conn->prepare(
            "DELETE FROM contactos WHERE id = ? AND usuario_id = ?"
        );
        $stmt->bind_param("ii", $id, $usuario_id);
        $stmt->execute();
        return $stmt->affected_rows;
    }
    public static function obtenerById($id, $usuario_id)
    {
        $conn = self::conectar_db();
        $stmt = $conn->prepare(
            "SELECT * FROM contactos WHERE id = ? and usuario_id = ?"
        );
        $stmt->bind_param("ii", $id, $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    public static function editar($id, $nombre, $numero, $usuario_id)
    {
        $conn = self::conectar_db();
        $stmt = $conn->prepare(
            "UPDATE contactos SET nombre = ?, numero = ? WHERE id = ? and usuario_id = ?"
        );
        $stmt->bind_param("ssii", $nombre, $numero, $id, $usuario_id);
        $stmt->execute();
        return $stmt->affected_rows;
    }
}
