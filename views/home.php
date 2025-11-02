<?php require_once(VIEWS_PATH . "layout/header.php"); ?>

  <section class="container mt-5">
  <div class="text-center mb-4">
    <h2>Bienvenido a Solaria</h2>
    <p class="lead">Energía solar accesible, sostenible y moderna para todos.</p>
  </div>

  <div class="row hero-row g-4 justify-content-center text-center">
    <!-- Residencial -->
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card h-100 shadow-sm border-0 hero-card">
        <img src="<?= BASE_URL ?>views/images/residencial.jpg" class="card-img-top" alt="Panel solar residencial">
        <div class="card-body">
          <h5 class="card-title">Residencial</h5>
          <p class="card-text">
            Ahorra energía en tu hogar con paneles solares de alto rendimiento.
          </p>
          <a href="<?= BASE_URL ?>panel/detalleResidencial" class="btn btn-primary btn-sm">Ver productos</a>
        </div>
      </div>
    </div>

    <!-- Empresarial -->
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card h-100 shadow-sm border-0 hero-card">
        <img src="<?= BASE_URL ?>views/images/empresarial.jpg" class="card-img-top" alt="Panel solar empresarial">
        <div class="card-body">
          <h5 class="card-title">Empresarial</h5>
          <p class="card-text">
            Soluciones personalizadas para empresas sostenibles y eficientes.
          </p>
          <a href="<?= BASE_URL ?>panel/detalleEmpresarial" class="btn btn-primary btn-sm">Ver productos</a>
        </div>
      </div>
    </div>

    <!-- Comercial -->
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card h-100 shadow-sm border-0 hero-card">
        <img src="<?= BASE_URL ?>views/images/instalaciones.jpg" class="card-img-top" alt="Instalación profesional">
        <div class="card-body">
          <h5 class="card-title">Comercial</h5>
          <p class="card-text">
            Nuestro equipo técnico certificado garantiza la mejor instalación.
          </p>
          <a href="<?= BASE_URL ?>panel/detalleComercial" class="btn btn-primary btn-sm">Ver productos</a>
      </div>
    </div>
  </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Otra sección opcional -->
    <section class="bg-light py-5 mt-5">
        <div class="container text-center">
            <h3>¿Por qué elegir Solaria?</h3>
            <p>Más de 10 años brindando soluciones solares de calidad y confianza.</p>
        </div>
    </section>
<?php require_once(VIEWS_PATH . "layout/footer.php"); ?>
