<?php
require_once(VIEWS_PATH.'layout/header.php');

$cliente = $data['cliente']; 
$nombres = $data['anteriores']['nombres'] ?? ($data['clienteUsuario']['nombres'] ?? '');
$apellidos = $data['anteriores']['apellidos'] ?? ($data['clienteUsuario']['apellidos'] ?? '');
$numDocumento = $data['anteriores']['numDocumentoId'] ?? $cliente['numDocumentoId'];
$presupuesto = $data['anteriores']['presupuestoDisp'] ?? $cliente['presupuestoDisp'];
$username = $data['anteriores']['username'] ?? ($data['clienteUsuario']['username'] ?? '');
?>

<h1 class="mb-4"><?php echo $data['titulo']; ?></h1>

<?php
if (isset($data['mensaje'])) {
    echo "<div class='alert alert-danger' role='alert'>{$data['mensaje']}</div>";
}
?>

<div class="card-form">
    <form action="<?php echo BASE_URL; ?>cliente/actualizar" method="POST">
        <input type="hidden" name="clienteId" value="<?php echo $cliente['clienteId']; ?>">

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nombres" class="form-label">Nombres *</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" 
                           value="<?php echo htmlspecialchars($nombres); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos *</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" 
                           value="<?php echo htmlspecialchars($apellidos); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="numDocumentoId" class="form-label">N° Documento *</label>
                    <input type="text" class="form-control" id="numDocumentoId" name="numDocumentoId" 
                           value="<?php echo htmlspecialchars($numDocumento); ?>" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="presupuestoDisp" class="form-label">Presupuesto Disponible *</label>
                    <input type="number" step="0.01" class="form-control" id="presupuestoDisp" name="presupuestoDisp" 
                           value="<?php echo htmlspecialchars($presupuesto); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username del Usuario a Vincular *</label>
                    <input type="text" class="form-control" id="username" name="username" 
                           value="<?php echo htmlspecialchars($username); ?>" required>
                    <small class="form-text text-muted">El username debe existir en la tabla de usuarios.</small>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-success">Actualizar Cliente</button>
            <a href="<?php echo BASE_URL; ?>cliente/mostrarPanelClientes" class="btn btn-secondary">Volver al panel</a>
        </div>
    </form>
</div>

<?php
require_once(VIEWS_PATH . 'layout/footer.php');
?>
