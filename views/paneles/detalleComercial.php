<?php require_once dirname(__FILE__, 2) . '/layout/header.php'; ?>

<div class="container py-5">
  <h2 class="mb-4 text-center">Panel Solar Comercial</h2>

  <div class="row align-items-center">
    <div class="col-md-6 text-center">
      <img src="<?php echo BASE_URL; ?>views/images/instalaciones.jpg" 
           class="img-fluid rounded shadow-sm" 
           alt="Panel Solar Comercial">
    </div>
    <div class="col-md-6">
      <h4>Solución Solar Comercial Completa</h4>
      <p class="text-muted">Optimizado para centros comerciales, hoteles y grandes instalaciones.</p>

      <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Potencia:</strong> 50 kW</li>
        <li class="list-group-item"><strong>Producción diaria promedio:</strong> 200 kWh</li>
        <li class="list-group-item"><strong>Garantía:</strong> 20 años</li>
        <li class="list-group-item"><strong>Precio estimado:</strong> $32,000 USD</li>
      </ul>

      <p>Este sistema garantiza un suministro continuo para grandes áreas comerciales. Su tecnología avanzada asegura un retorno de inversión en menos de 4 años.</p>

      <a href="<?php echo BASE_URL; ?>" class="btn btn-outline-secondary">Volver al inicio</a>
    
    </div>
  </div>
</div>

<?php require_once dirname(__FILE__, 2) . '/layout/footer.php'; ?>
