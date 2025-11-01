<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Envío</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f2f5;
        }
        h2 {
            color: #495057;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Registrar Nuevo Envío</h2>


        <form action="/Solaria/envios/guardar" method="POST" class="mt-4">

            <div class="mb-3">
                <label>Venta ID</label>
                <input type="number" name="ventaId" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Repartidor</label>
                <select name="repartidorId" class="form-select" required>
                    <?php foreach($repartidores as $repartidor): ?>
                        <option value="<?= $repartidor['repartidorId'] ?>"><?= htmlspecialchars($repartidor['nombreRepartidor']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Costo de envío</label>
                <input type="number" step="0.01" name="costoEnvio" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Fecha de Paquete Recibido</label>
                <input type="datetime-local" name="fechaPaqueteRecibido" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Fecha de Paquete Entregado</label>
                <input type="datetime-local" name="fechaPaqueteEntregado" class="form-control">
            </div>
            <div class="mb-3">
                <label>Estado</label>
                <select name="estado" class="form-select" required>
                    <option value="En preparación">En preparación</option>
                    <option value="En camino">En camino</option>
                    <option value="Entregado">Entregado</option>
                </select>
            </div>
            <button class="btn btn-success" type="submit">Guardar Envío</button>
            <a href="<?php echo BASE_URL; ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
