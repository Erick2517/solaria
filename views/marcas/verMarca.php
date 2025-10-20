<?php require_once dirname(__FILE__) . '/../../helpers/config.php'; ?>
<!doctype html>
<html lang="es-SV">
    <head>
        <title>Panel Marcas | Solaria</title>
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
    </head>

    <body>
        <header>
            <?php include (VIEWS_PATH.'menuNav.php'); ?>
        </header>
        <main class="container mt-4">
            <h1>Detalles de la marca <a href="<?=BASE_URL?>marca/listarMarcas">Volver</a></h1>
            <ul>
            <?php 
            if(isset($marca)) {
                echo "<li>" . htmlspecialchars($marca['nombreMarca']) . "</li>";

            } else {
                echo "<li>No hay marcas disponibles.</li>";
            }
            ?>
            </ul>
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
    </body>
</html>
