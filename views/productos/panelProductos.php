<?php require_once VIEWS_PATH.'layout/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h3>Productos</h3>
  <a href="<?= BASE_URL ?>producto/nuevo" class="btn btn-success">Nuevo</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Nombre del Producto</th>
            <th>Descripción</th>
            <th>Categoría</th>
            <th>Marca</th>
            <th>Precio</th>
            <th>Garantía</th>
            <th>Fecha Fab.</th>
            <th>Disponible</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($productos)): ?>
        <?php foreach ($productos as $p): ?>
            <tr>
                <td><?= htmlspecialchars($p['productoId']) ?></td>
                <td><?= htmlspecialchars($p['nombre_producto'] ?? '') ?></td>
                <td><?= htmlspecialchars($p['desc_producto'] ?? '') ?></td>
                <td><?= htmlspecialchars($p['categoria']) ?></td>
                <td><?= htmlspecialchars($p['marca']) ?></td>
                <td><?= number_format((float)$p['precio'], 2) ?></td>
                <td><?= htmlspecialchars($p['garantia']) ?></td>
                <td><?= htmlspecialchars($p['fechaFabricacion']) ?></td>
                <td><?= !empty($p['disponible']) ? 'Sí' : 'No' ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="9" class="text-center">No hay productos registrados.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>

<?php require_once VIEWS_PATH.'layout/footer.php'; ?>
