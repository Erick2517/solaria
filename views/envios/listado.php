<!DOCTYPE html> 
<html lang="es"> 
<head> 
<meta charset="UTF-8"> 
<title>Listado de Envíos</title> 
<link rel="stylesheet" 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> 
<style> 
    body { background-color: #f8f9fa; } 
    h2 { color: #343a40; } 
    table { background-color: #fff; } 
</style> 
</head> 
<body> 
<div class="container mt-5"> 
    <h2 class="mb-4">Lista de Envíos</h2> 
 
    <a href="<?= BASE_URL ?>envios/nuevo" class="btn btn-success">Nuevo Envío</a>

 
    <table class="table table-bordered table-hover"> 
        <thead class="table-dark"> 
            <tr> 
                <th>ID</th> 
                <th>Venta ID</th> 
                <th>Repartidor</th> 
                <th>Costo</th> 
                <th>Fecha Recibido</th> 
                <th>Fecha Entregado</th> 
                <th>Estado</th> 
                <th>Acción</th> 
            </tr> 
        </thead> 
        <tbody> 
        <?php foreach($envios as $e): ?> 
            <tr> 
                <td><?= $e['envioId'] ?></td> 
                <td><?= $e['ventaId'] ?></td> 
                <td><?= $e['nombreRepartidor'] ?></td> 
                <td>$<?= number_format($e['costoEnvio'],2) ?></td> 
                <td><?= $e['fechaPaqueteRecibido'] ?></td> 
                <td><?= $e['fechaPaqueteEntregado'] ?></td> 
                <td><?= $e['estado'] ?></td> 
                <td> 

<form method="post" action="<?php echo BASE_URL; ?>envios/cambiarEstado" class="d-flex gap-1">

                        <input type="hidden" name="envioId" value="<?= $e['envioId'] ?>"> 
                        <select name="estado" class="form-select form-select-sm"> 
                            <option value="En preparación" <?= $e['estado']=='En preparación'?'selected':'' ?>>En 
preparación</option> 
                            <option value="En camino" <?= $e['estado']=='En camino'?'selected':'' ?>>En 
camino</option> 
                            <option value="Entregado" <?= $e['estado']=='Entregado'?'selected':'' 
?>>Entregado</option> 
                        </select> 
                        <button class="btn btn-primary btn-sm">Actualizar</button> 
                    </form> 
                </td> 
            </tr> 
        <?php endforeach; ?> 
        </tbody> 
    </table> 
</div> 
</body> 
</html>