<?php require_once dirname(__FILE__).'/../layout/header.php'; ?>

<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0">Detalles del paquete</h2>
    <a href="<?php echo BASE_URL; ?>producto/catalogo" class="btn btn-outline-warning">Volver al catálogo</a>
  </div>

  <div class="card shadow-sm border-0">
    <div class="row g-0">
      <div class="col-md-4 p-3">
        <img src="<?php echo BASE_URL; ?>assets/img/solaria_card.jpg" class="img-fluid rounded" alt="Paquete">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h4 class="card-title mb-3"><?= htmlspecialchars($producto['marca']) ?> · <?= htmlspecialchars($producto['categoria']) ?></h4>

          <div class="table-responsive">
            <table class="table align-middle">
              <thead class="table-light">
                <tr>
                  <th>Componente</th><th>Especificación</th>
                </tr>
              </thead>
              <tbody>
                <tr><td>Marca</td><td><?= htmlspecialchars($producto['marca']) ?></td></tr>
                <tr><td>Categoría</td><td><?= htmlspecialchars($producto['categoria']) ?></td></tr>
                <tr><td>Precio</td><td>$<?= number_format($producto['precioUnitario'],2) ?></td></tr>
                <tr><td>Garantía</td><td><?= htmlspecialchars($producto['tiempoGarantia']) ?> años</td></tr>
                <tr><td>Fecha fabricación</td><td><?= htmlspecialchars($producto['fechaFab']) ?></td></tr>
                <tr><td>Disponibilidad</td><td><?= !empty($producto['existente'])?'Sí':'No' ?></td></tr>
              </tbody>
            </table>
          </div>

          <div class="d-flex gap-2 mt-3">
            <a href="<?php echo BASE_URL; ?>citas/nueva" class="btn btn-outline-primary">Programar cita</a>
            <a href="<?php echo BASE_URL; ?>pago/sandbox" class="btn btn-outline-secondary">Ir a pago (Sandbox)</a>
            <a href="<?php echo BASE_URL; ?>producto/catalogo" class="btn btn-primary">Agregar al carrito</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once dirname(__FILE__).'/../layout/footer.php'; ?>
