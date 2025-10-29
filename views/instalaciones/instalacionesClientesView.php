<link rel="stylesheet" href="<?php echo BASE_URL; ?>views/css/estilo.css">

<div class="contenedor-tabla">
    <h2>Instalaciones y técnicos asignados</h2>
    <table class="tabla-mi-estilo">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Cliente</th>
                <th>ID Instalación</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Estado</th>
                <th>Fecha Estimada</th>
                <th>Técnico Asignado</th>
            </tr>
        </thead>
        <tbody>
            <?php $instalaciones=$data['instalaciones'];
            if (!empty($instalaciones)): $i=1; ?>
                <?php foreach ($instalaciones as $inst): ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo htmlspecialchars($inst['clienteId']); ?></td>
                        <td><?php echo htmlspecialchars($inst['instalacionId']); ?></td>
                        <td><?php echo htmlspecialchars($inst['nombres']); ?></td>
                        <td><?php echo htmlspecialchars($inst['apellidos']); ?></td>
                        <td>
                            <span class="badge-estado badge-<?php echo strtolower(str_replace(' ', '', $inst['estado'])); ?>">
                                <?php echo ucfirst($inst['estado']); ?>
                            </span>
                        </td>
                        <td><?php echo htmlspecialchars($inst['fechaEstimada']); ?></td>
                        <td><?php echo htmlspecialchars($inst['tecnico'] ?? 'No asignado'); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">No hay instalaciones encontradas.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php require_once(VIEWS_PATH.'layout/footer.php'); ?>
