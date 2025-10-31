<?php
require_once 'conexion.php';

class LoginModel {
    private $conn;

    public function __construct() {
        // Asume que aquí defines la conexión de forma directa:
        $this->conn = new mysqli("localhost", "root", "", "solaria");
        
        // ¡IMPORTANTE! Verifica si la conexión falló (si las credenciales son incorrectas)
        if ($this->conn->connect_error) {
            die("Error de conexión a la BD: " . $this->conn->connect_error);
        }
    }

    public function verificarUsuario($username) {
        // Consulta segura usando prepared statements
        $sql = "SELECT u.*, r.rolName
                FROM usuarios u
                INNER JOIN roles r ON u.rolId = r.rolId
                WHERE u.username = ? 
                LIMIT 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function crearUsuario($rolId, $username, $pass, $email, $telefono) {
        $sql = "INSERT INTO usuarios (rolId, username, pass, email, telefonoContacto)
                VALUES ('$rolId', '$username', '$pass', '$email', '$telefono')";
        return $this->conn->query($sql);
    }

    public function obtenerRoles() {
        $sql = "SELECT * FROM roles";
        return $this->conn->query($sql);
    }
}
?>