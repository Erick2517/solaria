<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['titulo'] ?? 'Solaria'; // Título dinámico ?></title>
    <link rel="icon" href="<?php echo BASE_URL . 'images/ver/favicon.ico' ?>" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 240px;
            background-color: #fff;
            border-right: 1px solid #dee2e6;
            padding: 20px;
        }
        .sidebar-nav-list {
            list-style: none;
            padding-left: 0;
        }
        .sidebar-nav-list li {
            margin-bottom: 10px;
        }
        .sidebar-nav-list a {
            text-decoration: none;
            color: #333;
            display: block;
            padding: 8px 12px;
            border-radius: 6px;
        }
        .sidebar-nav-list a:hover, .sidebar-nav-list a.active {
            background-color: #e9ecef;
            color: #000;
        }
        .top-bar {
            background-color: #fff;
            border-bottom: 1px solid #dee2e6;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .content-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex-grow: 1;
            padding: 25px;
        }
        .card-form { /* Estilo para los formularios (basado en tu imagen) */
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 25px;
            max-width: 800px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .footer {
            background-color: #fff;
            border-top: 1px solid #dee2e6;
            padding: 20px;
            text-align: center;
            color: #6c757d;
            font-size: 0.9em;
        }

        .LogoMenu {
            width: 45px;
            height: 45px;
        }
    </style>
    <!-- para pagos con paypal -->
    <link
            rel="stylesheet"
            type="text/css"
            href="https://www.paypalobjects.com/webstatic/en_US/developer/docs/css/cardfields.css"
        />
        <script
            src="https://www.paypal.com/sdk/js?client-id=AYOeyCQvilLVKJGjslZfFSi_Nkl7A6OfXNarj5lS55iUcQXMhpp3AypVjAVkS_qvPcO5D415b9SnBFuN&buyer-country=US&currency=USD&components=buttons,card-fields&enable-funding=venmo"
            data-sdk-integration-source="developer-studio"></script>
</head>
<body>

<div class="content-wrapper">
    <header class="top-bar">
        <div class="d-flex align-items-center">
            <img src="<?php echo BASE_URL . 'images/ver/panel.png'?>" alt="Logo" class="me-2 LogoMenu"> <span class="fs-5 fw-bold">Panel de solaria</span>
        </div>
        <div class="fs-5">
            Bienvenido,
            <?php echo $_SESSION['username']; ?>

        </div>
    </header>

    <div class="dashboard-container">
        <?php require_once(VIEWS_PATH . 'layout/sidebar.php'); ?>
        <main class="content">
            <h4>Pagar Venta</h4>
            <a href="<?php echo BASE_URL; ?>ventas/listarVentas" class="btn btn-info mt-4 mb-4">Regresar</a>
            <div class="row">
                <?php
                if (isset($_SESSION['mensaje_error'])) {
                    echo '<div class="alert alert-danger">' . $_SESSION['mensaje_error'] . '</div>';
                    unset($_SESSION['mensaje_error']);
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
                                    $productosPorID = array_column($productos, null, 'productoId');
                                    $productoVenta = $productosPorID[$venta['detalle'][0]['productoId']];
                                    $total = $venta['detalle'][0]['cantidad'] * $productoVenta['precioUnitario']; 
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
                                <div id="paypal-button-container" class="paypal-button-container"></div>

                            </div>
                        </div>
                    </fieldset>
                </div>
            </form>
    <script src="https://www.paypal.com/sdk/js?client-id=Ac-zkRKeYaBQwp30_huEEXZ-VG8Gzy15HuOjHF8Kdej1SXff-XW3bfQjlDOpikNyFRCp2qscOrKGnYQX&currency=USD"></script>

<script>
    
    paypal.Buttons({
        
        
        createOrder: function(data, actions) {
            let totalAmount = <?php echo $total ?>; 
            
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: totalAmount,
                        currency_code: 'USD' 
                    }
                }]
            });
        },

        
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                
                fetch('<?php echo BASE_URL; ?>ventas/verficarPago', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        orderID: data.orderID,
                        ventaId: <?php echo $venta['ventaId']; ?>,
                        clienteId: <?php echo $venta['clienteId']; ?>,
                        monto: <?php echo $total; ?>
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        setTimeout(function() {
                            document.location.href = '<?php echo BASE_URL; ?>ventas/ver/<?php echo $venta["ventaId"]; ?>';
                        }, 100);
                    } else {
                        alert('Hubo un problema al verificar tu pago.');
                    }
                });
            });
        },

        onError: function(err) {
            console.error('Ocurrió un error con el pago:', err);
            alert('Ocurrió un error. Por favor, intenta de nuevo.');
        },
        
        onCancel: function (data) {
            
            console.log('Pago cancelado:', data);
        }

    }).render('#paypal-button-container');
</script>
<?php require_once(VIEWS_PATH . "layout/footer.php"); ?>