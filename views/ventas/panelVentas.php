<?php require_once(VIEWS_PATH . "layout/header.php"); ?>
<h4>Ventas</h4>
<a href="<?php echo BASE_URL; ?>ventas/agregarVentaForm" class="btn btn-success mt-4 mb-4">Agregar Venta</a>
<div class="row">
    <?php
    if (isset($_SESSION['mensaje_error'])) {
        echo '<div class="alert alert-danger">' . $_SESSION['mensaje_error'] . '</div>';
        unset($_SESSION['mensaje_error']);
    }else{
        if (isset($_SESSION['mensaje_exito'])) {
            echo '<div class="alert alert-success">' . $_SESSION['mensaje_exito'] . '</div>';
            unset($_SESSION['mensaje_exito']);
        }
    }
    ?>
</div>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Total ($)</th>
            <th>Fecha de Entrega</th>
            <th>Dirección</th>
            <th>Estado de Pago</th>
            <th >Acciones</th>
            </tr>
    </thead>
    <tbody>

        <?php $contador = 1; foreach($ventas as $venta): ?>
        <tr>
            <th><?php echo $contador++; ?></th>
            <td><?php echo $venta['fechaVenta']; ?></td>
            <?php $nombreC = $clientes[$venta['clienteId']]['nombres'] . ' ' . $clientes[$venta['clienteId']]['apellidos']; ?>
            <td><?= $nombreC; ?></td>
            <td><?php echo $venta['total']; ?></td>
            <td><?php echo $venta['fechaEntregaEstimada']; ?></td>
            <td><?php echo $venta['direccionEntrega']; ?></td>
            <td><?php  
                    if(!isset($pagos[$venta['ventaId']])){ 
                        echo "Pendiente";
                    }else{
                        echo "Pagado";
                    }
                ?>
            </td>
            <td>
                <?php  
                    if(!isset($pagos[$venta['ventaId']])){ 
                ?>
                    <a href="<?php echo BASE_URL; ?>ventas/pagar/<?php echo $venta['ventaId']; ?>" class="btn btn-warning btn-sm">Pagar</a>
                    <a href="<?php echo BASE_URL; ?>ventas/editar/<?php echo $venta['ventaId']; ?>" class="btn btn-primary btn-sm">Editar</a>
                <?php
                    }else{
                        $url = BASE_URL . "ventas/ver/" . $venta['ventaId'];
                        echo "<a href='{$url}' class='btn btn-primary btn-sm'>Ver</a>";
                    }
                ?>
                    
            </td>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require_once(VIEWS_PATH . "layout/footer.php"); ?>