<?php include 'views/header.php'; ?>

<div class="container mt-5">
    <h2>Relaciones Citas y Técnicos</h2>
    <a href="index.php?mod=citastecnicos&action=crear" class="btn btn-success mb-3">Nueva Asignación</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID Relación</th>
                <th>Técnico</th>
                <th>Especialidad</th>
                <th>Nivel</th>
                <th>Cita</th>
                <th>Descripción</th>
                <th>Fecha Acordada</th>
                <th>Fecha Registro</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($relaciones as $r): ?>
            <tr>
                <td><?= $r['citaTecnicoId']; ?></td>
                <td><?= $r['tecnicoNombre']; ?></td>
                <td><?= $r['especialidad']; ?></td>
                <td><?= $r['nivelCategoria']; ?></td>
                <td><?= $r['citaId']; ?></td>
                <td><?= $r['descripcion']; ?></td>
                <td><?= $r['fechaAcordadaCita']; ?></td>
                <td><?= $r['fechaRegistro']; ?></td>
                <td>
                    <a href="index.php?mod=citastecnicos&action=eliminar&id=<?= $r['citaTecnicoId']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'views/footer.php'; ?>
