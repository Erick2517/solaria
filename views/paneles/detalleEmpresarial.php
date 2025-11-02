<?php require_once dirname(__FILE__, 2) . '/layout/header.php'; ?>

<div class="container py-5">
  <h2 class="mb-4 text-center">Panel Solar Empresarial</h2>

  <div class="row align-items-center">
    <div class="col-md-6 text-center">
      <img src="<?php echo BASE_URL; ?>views/images/empresarial.jpg" 
           class="img-fluid rounded shadow-sm" 
           alt="Panel Solar Empresarial">
    </div>
    <div class="col-md-6">
      <h4>Sistema Solar Empresarial de Alta Capacidad</h4>
      <p class="text-muted">Ideal para oficinas, bodegas y fábricas con consumo energético medio o alto.</p>

      <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Potencia:</strong> 25 kW</li>
        <li class="list-group-item"><strong>Producción diaria promedio:</strong> 100 kWh</li>
        <li class="list-group-item"><strong>Garantía:</strong> 15 años</li>
        <li class="list-group-item"><strong>Precio estimado:</strong> $17,500 USD</li>
      </ul>

      <p>Este sistema está diseñado para negocios que buscan independencia energética y reducción de costos operativos. Su instalación incluye monitoreo remoto y soporte técnico.</p>

      <a href="<?php echo BASE_URL; ?>" class="btn btn-outline-secondary">Volver al inicio</a>
      
    </div>
  </div>
</div>

<?php require_once dirname(__FILE__, 2) . '/layout/footer.php'; ?>
