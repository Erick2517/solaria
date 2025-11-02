<?php require_once dirname(__FILE__, 2) . '/layout/header.php'; ?>

<div class="container py-5">
  <h2 class="mb-4 text-center">Panel Solar Residencial Premium</h2>

  <div class="row align-items-center">
    <div class="col-md-6 text-center">
      <img src="<?php echo BASE_URL; ?>views/images/residencial.jpg" 
           class="img-fluid rounded shadow-sm" 
           alt="Panel Solar Residencial">
    </div>
    <div class="col-md-6">
      <h4>Kit Solar Residencial Premium</h4>
      <p class="text-muted">Perfecto para hogares con alto consumo energético.</p>

      <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Potencia:</strong> 5 kW</li>
        <li class="list-group-item"><strong>Producción diaria promedio:</strong> 20 kWh</li>
        <li class="list-group-item"><strong>Garantía:</strong> 10 años</li>
        <li class="list-group-item"><strong>Precio estimado:</strong> $4,800 USD</li>
      </ul>

      <p>Este sistema está diseñado para abastecer la energía de una casa familiar de 3 a 5 personas. Su rendimiento es óptimo en zonas soleadas y se puede complementar con baterías.</p>

      <a href="<?php echo BASE_URL; ?>" class="btn btn-outline-secondary">Volver al inicio</a>
    </div>
  </div>
</div>

<?php require_once dirname(__FILE__, 2) . '/layout/footer.php'; ?>
