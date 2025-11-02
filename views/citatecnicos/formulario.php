<?php include VIEWS_PATH.'layout/header.php'; ?>

<div class="container mt-5">
    <h2>Asignar Técnico a Cita</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label class="form-label">Técnico</label>
            <select name="tecnicoId" class="form-select" required>
                <option value="">Seleccione un técnico</option>
                <?php foreach ($tecnicos as $t): ?>
                    <option value="<?= $t['tecnicoId']; ?>">
                        <?= $t['especialidad']; ?> (Nivel <?= $t['nivelCategoria']; ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Cita</label>
            <select name="citaId" class="form-select" required>
                <option value="">Seleccione una cita</option>
                <?php foreach ($citas as $c): ?>
                    <option value="<?= $c['citaId']; ?>">
                        <?= $c['descripcion']; ?> - <?= $c['fechaAcordadaCita']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar Relación</button>
        <a href="index.php?mod=citastecnicos&action=listar" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php include 'views/footer.php'; ?>
