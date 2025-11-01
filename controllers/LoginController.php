<?php
require_once 'models/LoginModel.php';

class LoginController {
    private $model;

    public function __construct() {
        $this->model = new LoginModel();
        session_start();
    }

    public function index() {
        require_once 'views/login/login.php';
    }


public function registro() {
    $roles = $this->model->obtenerRoles();
    require_once 'views/login/registro.php';
}

public function validar() {
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $usuario = $this->model->verificarUsuario($username);

    if ($usuario && password_verify($pass, $usuario['pass'])) {
        session_start();
        $_SESSION['usuarioId'] = $usuario['usuarioId'];
        $_SESSION['username'] = $usuario['username'];
        $_SESSION['rol'] = $usuario['rolName'];

        /*redireccionar según rol
        if ($usuario['rolName'] == 'Admin') {
            header('Location: /Solaria/login/panelAdmin');
        } else {
            header('Location: /Solaria/login/panelVendedor');
        }*/
        if($usuario['rolName'] == 'Cliente' || $usuario['rolName'] == 'Admin'){
            header('Location: /Solaria/cliente/mostrarPanelClientes');
        }
        exit;
    } else {
        session_start();
        $_SESSION['error'] = 'Usuario o contraseña incorrectos.';
        header('Location: /Solaria/login');
        exit;
    }
}



    public function panelAdmin() {
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'Admin') {
            header('Location: /solaria/login');
            exit;
        }
        require_once 'views/login/panel_admin.php';
    }

    public function panelVendedor() {
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'Vendedor') {
            header('Location: /solaria/login');
            exit;
        }
        require_once 'views/login/panel_vendedor.php';
    }

    public function logout() {
        session_destroy();
        header('Location: /solaria/login');
    }

    public function guardarRegistro() {
        $username = $_POST['username'];
        $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $rolId = $_POST['rolId'];

        $this->model->crearUsuario($rolId, $username, $pass, $email, $telefono);
        header('Location: /solaria/login');
    }
}
?>