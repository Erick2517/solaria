<?php 
require_once dirname(__FILE__) . '/CitaModel.php'; 

?>
<!doctype html>
<html lang="es-SV">
<head>
    <title> Citas | Solaria</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
    <header class="bg-dark text-white p-3 text-center">
        <h2>Panel de Citas Técnicas</h2>
    </header>

    <main class="container mt-4">

        <section class="mb-4">
            <h3>👷 Técnicos Disponibles</h3>
            <ul class="list-group">
                <?php 
                if(!empty($verCitaTecnico)) {
                    foreach($verCitaTecnico as $tec) {
                        echo "<li class='list-group-item'>" . htmlspecialchars($tec['nombreTec']) . "</li>";
                    }
                } else {
                    echo "<li class='list-group-item text-muted'>No hay técnicos disponibles.</li>";
                }
                ?>
            </ul>
        </section>

        <section class="mb-4">
            <h3>🔧 Técnicos Ocupados</h3>
            <ul class="list-group">
                <?php 
                if(!empty($verCitas)) {
                    foreach($verCitas as $tec) {
                        echo "<li class='list-group-item'>" . htmlspecialchars($tec['nombreTec']) . "</li>";
                    }
                } else {
                    echo "<li class='list-group-item text-muted'>No hay técnicos ocupados.</li>";
                }
                ?>
            </ul>
        </section>

        <section>
            <h3>📅 Citas Programadas</h3>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Técnico</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(!empty($citas)) {
                        foreach($citas as $cita) {
                            echo "<tr>
                                    <td>{$cita['id']}</td>
                                    <td>{$cita['nombreTec']}</td>
                                    <td>{$cita['fecha']}</td>
                                    <td>{$cita['hora']}</td>
                                    <td>{$cita['estado']}</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center text-muted'>No hay citas registradas</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>

    <footer class="bg-dark text-white text-center p-3 mt-4">
        <p>&copy; 2025 Solaria. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
