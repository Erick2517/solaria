<?php require_once dirname(__FILE__).'/../layout/header.php'; ?>

<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0">Catálogo de paquetes solares</h2>
    <a class="btn btn-warning fw-semibold" href="<?php echo BASE_URL; ?>calculadora">Calcular mi paquete</a>
  </div>

  <div class="row g-4">
    <?php if(!empty($productos)): foreach($productos as $p): ?>
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="card h-100 shadow-sm border-0">
          <img src="<?php echo BASE_URL; ?>assets/img/solaria_card.jpg" class="card-img-top" alt="Paneles">
          <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2">
              <span class="badge bg-secondary"><?= htmlspecialchars($p['categoria']) ?></span>
              <span class="badge bg-dark"><?= htmlspecialchars($p['marca']) ?></span>
              <span class="badge border"><?= intval($p['tiempoGarantia']) ?> años garantía</span>
            </div>

            <h5 class="card-title mb-1"><?= htmlspecialchars($p['marca']) ?> · <?= htmlspecialchars($p['categoria']) ?></h5>
            <p class="text-muted mb-3">Fabricado: <?= htmlspecialchars($p['fechaFab']) ?></p>

            <div class="d-flex justify-content-between align-items-center">
              <div class="fs-4 fw-bold">$<?= number_format($p['precioUnitario'], 0) ?></div>
              <a href="<?php echo BASE_URL; ?>producto/detalle&id=<?= intval($p['productoId']) ?>" class="btn btn-primary">
                Ver detalles
              </a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; else: ?>
      <div class="col-12"><div class="alert alert-info">No hay paquetes disponibles por el momento.</div></div>
    <?php endif; ?>
  </div>
</div>

<?php require_once dirname(__FILE__).'/../layout/footer.php'; ?>
