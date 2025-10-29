<div class="container mt-4">
    <h2>Instalaciones y técnicos asignados</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>ID Cliente</th>
                    <th>ID Instalación</th>
                    <th>Estado</th>
                    <th>Fecha Estimada</th>
                    <th>Técnico Asignado (usuario)</th>
                </tr>
            </thead>
            <tbody>
                <?php $instalaciones = $data['instalaciones']; 
                      if (!empty($instalaciones)):
                      $i = 1; ?>
                    <?php foreach ($instalaciones as $inst): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= htmlspecialchars($inst['clienteId']); ?></td>
                            <td><?= htmlspecialchars($inst['instalacionId']); ?></td>
                            <td><?= htmlspecialchars(ucfirst($inst['estado'])); ?></td>
                            <td><?= htmlspecialchars($inst['fechaEstimada']); ?></td>
                            <td><?= htmlspecialchars($inst['tecnico'] ?? 'No asignado'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No hay instalaciones encontradas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
