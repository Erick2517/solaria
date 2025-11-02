<?php require_once dirname(__FILE__) . '/../helpers/config.php'; ?>
<!doctype html>
<html lang="es-SV">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Productos | Solaria</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php require_once dirname(__FILE__) . '/menuNav.php'; ?>
<div class="container py-4">
  <h3 class="mb-3">Productos</h3>
  <div class="row g-4">
  <?php
    require_once dirname(__FILE__) . '/../models/ProductoModel.php';
    $m = new ProductoModel();
    $items = $m->verProductos();
    if(!empty($items)):
      foreach($items as $p): ?>
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <img class="card-img-top" src="<?php echo htmlspecialchars($p['imagenURL'] ?? 'https://via.placeholder.com/700x400'); ?>">
          <div class="card-body">
            <span class="badge bg-success"><?php echo htmlspecialchars($p['categoria']); ?></span>
            <span class="badge bg-secondary"><?php echo htmlspecialchars($p['marca']); ?></span>
            <h5 class="mt-2"><?php echo htmlspecialchars($p['nombreProducto'] ?? ('#'.$p['productoId'])); ?></h5>
            <div class="d-flex justify-content-between align-items-center">
              <small class="text-muted">Cap: <?php echo htmlspecialchars($p['capacidadKW'] ?? ''); ?>kW</small>
              <strong>$<?php echo number_format($p['precioUnitario'],2); ?></strong>
            </div>
            <a class="btn btn-primary w-100 mt-2" href="<?php echo BASE_URL; ?>producto/detalle/<?php echo $p['productoId']; ?>">Ver detalles</a>
          </div>
        </div>
      </div>
  <?php endforeach; else: ?>
    <div class="col-12 text-muted">No hay productos.</div>
  <?php endif; ?>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
