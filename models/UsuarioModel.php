<?php
require_once "BaseModel.php";

class UsuariosModel extends BaseModel
{
    public static function obtenerByEmail($correo)
    {
        $conn = self::conectar_db();
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE correo = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    public static function crear($nombre, $correo, $password)
    {
        $conn = self::conectar_db();
        $stmt = $conn->prepare(
            "INSERT INTO usuarios (nombre, correo, password) VALUES (?,?,?)"
        );
        $stmt->bind_param("sss", $nombre, $correo, $password);
        $stmt->execute();
        return $stmt->insert_id;
    }
}
