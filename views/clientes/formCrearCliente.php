<!-- //autor: José García
//fecha de última modificación: 21/10/2025
//descripcion: formulario vista para editar un cliente -->
<?php
require_once(VIEWS_PATH . 'layout/header.php');
$old_nombres = $data['ant']['nombres'] ?? '';
$old_apellidos = $data['ant']['apellidos'] ?? '';
$old_numDocumento = $data['ant']['numDocumentoId'] ?? '';
$old_presupuesto = $data['ant']['presupuestoDisp'] ?? '';
$old_username = $data['ant']['username'] ?? '';
?>

<h1 class="mb-4"><?php echo $data['titulo']; ?></h1>

<?php
//mostrar error
// A diferencia del panel. este error viene de $data y no de $_SESSION
if (isset($data['mensaje'])) {
    echo "<div class='alert alert-danger' role='alert'>{$data['mensaje']}</div>";
}
?>

<div class="card-form">
    <form action="<?php echo BASE_URL; ?>cliente/insertar" method="POST">
        
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nombres" class="form-label">Nombres *</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" 
                           value="<?php echo htmlspecialchars($old_nombres); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos *</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" 
                           value="<?php echo htmlspecialchars($old_apellidos); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="numDocumentoId" class="form-label">N° Documento *</label>
                    <input type="text" class="form-control" id="numDocumentoId" name="numDocumentoId" 
                           value="<?php echo htmlspecialchars($old_numDocumento); ?>" required>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="presupuestoDisp" class="form-label">Presupuesto Disponible *</label>
                    <input type="number" step="0.01" class="form-control" id="presupuestoDisp" name="presupuestoDisp" 
                           value="<?php echo htmlspecialchars($old_presupuesto); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username del Usuario a Vincular *</label>
                    <input type="text" class="form-control" id="username" name="username" 
                           value="<?php echo htmlspecialchars($old_username); ?>" required>
                    <small class="form-text text-muted">El username debe existir en la tabla de usuarios.</small>
                </div>
            </div>
        </div>
        
        <div class="mt-3">
            <button type="submit" class="btn btn-success">Guardar Cliente</button>
            <a href="<?php echo BASE_URL; ?>cliente/mostrarPanelClientes" class="btn btn-secondary">Volver al panel</a>
        </div>
        
    </form>
</div>

<?php
require_once(VIEWS_PATH . 'layout/footer.php');
?>