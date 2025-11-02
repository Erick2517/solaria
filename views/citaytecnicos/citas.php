<?php include 'views/header.php'; ?>

<div class="container mt-4">
    <h2>Lista de Citas</h2>
    <a href="index.php?mod=citas&action=crear" class="btn btn-primary mb-3">Nueva Cita</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Fecha Acordada</th>
                <th>Fecha Registro</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($citas as $cita): ?>
                <tr>
                    <td><?= $cita['citaId']; ?></td>
                    <td><?= $cita['clienteId']; ?></td>
                    <td><?= $cita['descripcion']; ?></td>
                    <td><?= $cita['fechaAcordadaCita']; ?></td>
                    <td><?= $cita['fechaRegistro']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'views/footer.php'; ?>
