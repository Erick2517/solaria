<?php require_once dirname(__FILE__).'/../layout/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Categorías</h2>
  <a class="btn btn-success" href="<?= BASE_URL ?>categoria/nuevo">Nuevo</a>
</div>

<?php if (!empty($_SESSION['mensaje'])): ?>
  <div class="alert alert-info"><?= $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?></div>
<?php endif; ?>

<div class="card shadow-sm">
  <div class="table-responsive">
    <table class="table table-striped mb-0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Descripción</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($categorias)): ?>
          <tr><td colspan="4" class="text-center">No hay categorías</td></tr>
        <?php else: foreach ($categorias as $c): ?>
          <tr>
            <td><?= $c['categoriaId'] ?></td>
            <td><?= htmlspecialchars($c['nombreCat']) ?></td>
            <td><?= htmlspecialchars($c['descripcion']) ?></td>
            
          </tr>
        <?php endforeach; endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?php require_once dirname(__FILE__).'/../layout/footer.php'; ?>

// ultimo cambio 10:34