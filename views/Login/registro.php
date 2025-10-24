<?php
require '../../models/LoginModel.php';
$model = new LoginModel();
$roles = $model->obtenerRoles();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card mx-auto shadow p-4" style="max-width:500px;">
        <h3 class="text-center">Crear Cuenta</h3>
        <form action="/solaria/login/guardarRegistro" method="POST">
            <div class="mb-3">
                <label>Usuario</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Contraseña</label>
                <input type="password" name="pass" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Teléfono</label>
                <input type="text" name="telefono" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Rol</label>
                <select name="rolId" class="form-select" required>
                    <option value="">Seleccione un rol</option>
                    <?php while($r = $roles->fetch_assoc()): ?>
                        <option value="<?= $r['rolId'] ?>"><?= $r['rolName'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success w-100">Registrar</button>
        </form>
        <p class="text-center mt-3"><a href="/solaria/login">Volver al login</a></p>
    </div>
</div>
</body>
</html>