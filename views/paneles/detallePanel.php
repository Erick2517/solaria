<?php require_once dirname(__FILE__, 2) . '/layout/header.php'; ?>

<div class="container py-5">
  <h2 class="mb-4 text-center">Detalles del Panel Solar</h2>

  <div class="row align-items-center">
    <div class="col-md-6 text-center">
      <img src="<?php echo BASE_URL; ?>views/images/residencial.jpg" class="img-fluid rounded shadow-sm" alt="Panel Solar Residencial">
    </div>
    <div class="col-md-6">
      <h4>Kit Solar Residencial Premium</h4>
      <p class="text-muted">Ideal para hogares con alto consumo energético.</p>

      <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Potencia:</strong> 5 kW</li>
        <li class="list-group-item"><strong>Capacidad diaria:</strong> ~20 kWh</li>
        <li class="list-group-item"><strong>Garantía:</strong> 10 años</li>
        <li class="list-group-item"><strong>Precio:</strong> $4,800 USD</li>
      </ul>

      <p>Este sistema puede alimentar un hogar promedio con aire acondicionado, refrigerador, iluminación LED y electrodomésticos. Su estructura es resistente a climas cálidos y lluviosos, y ofrece una larga vida útil con bajo mantenimiento.</p>

      <a href="<?php echo BASE_URL; ?>producto" class="btn btn-outline-secondary">Volver a productos</a>
      
    </div>
  </div>
</div>

<?php require_once dirname(__FILE__, 2) . '/layout/footer.php'; ?>
