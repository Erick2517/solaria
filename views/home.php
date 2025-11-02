<?php require_once dirname(__FILE__) . '/../helpers/config.php'; ?>
<!doctype html>
<html lang="es-SV">
    <head>
        <title>Inicio | Solaria</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
 <!--        <link rel="stylesheet" href="../views/css/estilo.css"> ESTE NO VA A FUNCIONAR, DEBE USARSE CORRECTAMENTE LA BASE_URL-->
<!-- <link rel="stylesheet" href="<?php echo rtrim(BASE_URL,'/'); ?>/views/css/estilo.css?v=2"> -->
<link rel="stylesheet" href="<?php echo BASE_URL; ?>views/css/estilo.css">

    </head>

    <body>
        <header>
            <?php include 'menuNav.php'; ?>
        </header>
        <main>
           
               <!-- 🔽 Aquí empieza tu nuevo contenido -->
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
        </main>
        <footer>
            <footer class="footer">
                <p>&copy; 2025 Solaria. Todos los derechos reservados.</p>
                <p>Contacto: info@solaria.com</p>
            </footer>
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
        <script src="<?php echo BASE_URL; ?>views/js/script.js"></script>
    </body>
</html>
