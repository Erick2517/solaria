<?php
if (!defined('BASE_URL')) {
    require_once __DIR__ . '/../../helpers/config.php';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Sistema de Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; }
        .login-container {
            max-width: 400px;
            margin: 8% auto;
            padding: 2rem;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
<div class="login-container">
    <h2 class="text-center mb-4">Iniciar Sesión</h2>
    <form action="<?php echo BASE_URL; ?>login/validar" method="POST">
        <div class="mb-3">
            <label>Usuario</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Contraseña</label>
            <input type="password" name="pass" class="form-control" required>
        </div>
        <button class="btn btn-primary w-100">Ingresar</button>
    </form>

    <p class="text-center mt-3">
        ¿No tienes cuenta?
        <a href="<?php echo BASE_URL; ?>views/login/registro.php">Registrate Aquí</a></li>
    </p>

    <?php
    session_start();
    if (isset($_SESSION['error'])) {
        echo "<div class='alert alert-danger mt-3 text-center'>".$_SESSION['error']."</div>";
        unset($_SESSION['error']);
    }
    ?>
</div>
</body>
</html>