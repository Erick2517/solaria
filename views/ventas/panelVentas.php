<?php require_once(VIEWS_PATH . "layout/header.php"); ?>
<h4>Ventas</h4>
<a href="<?php echo BASE_URL; ?>ventas/agregarVentaForm" class="btn btn-success mt-4 mb-4">Agregar Venta</a>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Total ($)</th>
            <th>Fecha de Entrega</th>
            <th>Fecha de envio</th>
            <th>Dirección</th>
            <th>Acciones</th>
            </tr>
    </thead>
    <tbody>

        <?php $contador = 1; foreach($ventas as $venta): ?>
        <tr>
            <th><?php echo $contador++; ?></th>
            <td><?php echo $venta['fechaVenta']; ?></td>
            <td><?php echo $venta['clienteId']; ?></td>
            <td><?php echo $venta['total']; ?></td>
            <td><?php echo $venta['fechaEntregaEstimada']; ?></td>
            <td><?php echo $venta['fechaEnvio']; ?></td>
            <td><?php echo $venta['direccionEntrega']; ?></td>
            <td>
                <a href="<?php echo BASE_URL; ?>ventas/verVenta/<?php echo $venta['ventaId']; ?>" class="btn btn-info btn-sm">Ver</a>
                <a href="<?php echo BASE_URL; ?>ventas/editarVenta/<?php echo $venta['ventaId']; ?>" class="btn btn-warning btn-sm">Editar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require_once(VIEWS_PATH . "layout/footer.php"); ?>