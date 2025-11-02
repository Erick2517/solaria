<?php require_once(VIEWS_PATH . "layout/header.php"); ?>
    <h4>Ver Venta</h4>
    <a href="<?php echo BASE_URL; ?>ventas/listarVentas" class="btn btn-info mt-4 mb-4">Regresar</a>
    <div class="row">
        <?php
        if (isset($_SESSION['mensaje_error'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['mensaje_error'] . '</div>';
            unset($_SESSION['mensaje_error']);
        }
        if (isset($_SESSION['mensaje_exito'])) {
            echo '<div class="alert alert-success">' . $_SESSION['mensaje_exito'] . '</div>';
            unset($_SESSION['mensaje_exito']);
        }
        ?>
    </div>
    <form action="#" method="POST">
        <div class="row">
            <div class="mb-3 col-md-4">
                <label for="clienteId" class="form-label">Cliente</label>
                <select class="form-select" id="clienteId" name="clienteId" required disabled>
                    <option value="" disabled>Seleccione un cliente</option>
                    <?php foreach ($clientes as $cliente): ?>
                        <?php
                        if($venta['clienteId'] == $cliente['clienteId']) {
                            $selected = 'selected';
                        } else {
                            $selected = '';
                        }
                        ?>
                        <option value="<?php echo $cliente['clienteId']; ?>" <?= $selected; ?>>
                            <?php echo $cliente['nombres'] . ' ' . $cliente['apellidos']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3 col-md-4">
                <label for="fechaVenta" class="form-label">Fecha:</label>
                <input type="date" class="form-control" id="fechaVenta" name="fechaVenta" required value="<?= $venta['fechaVenta']; ?>" disabled>
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-md-4">
                <label for="direccionEntrega" class="form-label">Direccion de Entrega</label>
                <textarea name="direccionEntrega" class="form-control" id="direccionEntrega" rows="2" required disabled><?= $venta['direccionEntrega']; ?></textarea>
            </div>
            <div class="mb-3 col-md-4">
                <label for="fechaEstimada" class="form-label">Fecha Estimada de entrega:</label>
                <input type="date" class="form-control" id="fechaEstimada" name="fechaEstimada" required value="<?= $venta['fechaEntregaEstimada']; ?>" disabled>
            </div>
        </div>
        <div class="row">
            <fieldset class="border p-3 rounded">
                <legend class="float-none w-auto px-3 h6">
                    Detalle de producto
                </legend>
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label for="productoId" class="form-label">Producto</label>
                        <select class="form-select" id="productoId" name="productoId" required disabled> 
                            <option value="" disabled selected>Seleccione un producto</option>
                                <?php foreach ($productos as $prod): 
                                    if($venta['detalle'][0]['productoId'] == $prod['productoId']) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    }
                                    ?>
                                
                                <option value="<?php echo $prod['productoId']; ?>" <?= $selected; ?>>
                                    <?php echo $prod['nombre_producto'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" disabled required value="<?= $venta['detalle'][0]['cantidad']; ?>" min ="1">
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="cantidad" class="form-label">Total:</label>
                        <?php 
                            $total = $venta['total']; 
                        ?>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" required value="<?= $total; ?>" min ="1" disabled>
                    </div>
                </div>
            </fieldset>
            <fieldset class="border p-3 rounded">
                <legend class="float-none w-auto px-3 h6">
                    Pagar con Paypal
                </legend>
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label for="estado"></label>
                        <input type="text" disabled class="form-control" id="estado" name="estado" value="Pagado" >
                    </div>
                </div>
            </fieldset>
        </div>
    </form>

<?php require_once(VIEWS_PATH . "layout/footer.php"); ?>