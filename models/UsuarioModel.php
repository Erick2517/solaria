<?php
require_once('conexion.php');

class UsuarioModel extends Conexion {
    private $conexion;

    public function __construct() {
        parent::__construct();
        $this->conexion = $this->getConexion();
    }

        /**
     * Edita los datos de nombres y apellidos de un usuario según su usuarioId.
     * @param int $usuarioId
     * @param string $nombres
     * @param string $apellidos
     * @return bool|string True si fue exitoso, mensaje de error si falla.
     */
    public function editarUsuarioPorID($usuarioId, $nombres, $apellidos) {
        try {
            $sql = "UPDATE usuarios SET nombres = ?, apellidos = ? WHERE usuarioId = ?";
            $cmd = $this->conexion->prepare($sql);
            $cmd->execute([$nombres, $apellidos, $usuarioId]);

            if ($cmd->rowCount() > 0) {
                return true;
            } else {
                return "No se realizaron cambios (¿ya tenían esos datos?).";
            }
        } catch(PDOException $e) {
            error_log("Error al editar usuario: " . $e->getMessage());
            return "Error de base de datos al intentar editar el usuario.";
        }
    }

}