<?php
require_once 'conexion.php';

class LoginModel {
    private $conn;

    public function __construct() {
        // conexión de forma directa, editarlo porque debe hacerse con heerencia
        $this->conn = new mysqli("localhost", "root", "", "solaria");
        
        if ($this->conn->connect_error) {
            die("Error de conexión a la BD: " . $this->conn->connect_error);
        }
    }

    public function verificarUsuario($username) {
        //usando prepared statements
        $sql = "select u.*, r.rolName
                from usuarios u
                inner JOIN roles r ON u.rolId = r.rolId
                where u.username = ? 
                limit 1";

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