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
            <h1>esta es la pagina de inicio</h1>
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
