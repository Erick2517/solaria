<?php require_once dirname(__FILE__) . '/../layout/header.php'; ?>


<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Marcas</h2>
  <a class="btn btn-success" href="<?= BASE_URL ?>marca/nuevo">Nuevo</a>
</div>

<?php if (!empty($_SESSION['mensaje'])): ?>
  <div class="alert alert-info py-2"><?= htmlspecialchars($_SESSION['mensaje']); unset($_SESSION['mensaje']); ?></div>
<?php endif; ?>

<div class="card shadow-sm">
  <div class="table-responsive">
    <table class="table table-striped mb-0">
      <thead>
        <tr>
          <th style="width:80px">ID</th>
          <th>Nombre</th>
          <th style="width:110px"></th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($marcas)): ?>
          <tr><td colspan="3" class="text-center py-4">No hay marcas</td></tr>
        <?php else: ?>
          <?php foreach ($marcas as $m): ?>
            <tr>
              <td><?= (int)$m['marcaId'] ?></td>
              <td><?= htmlspecialchars($m['nombre']) ?></td>
              <td>
                <a class="btn btn-sm btn-outline-primary"
                   href="<?= BASE_URL ?>marca/editar/<?= (int)$m['marcaId'] ?>">
                  Editar
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?php require_once dirname(__FILE__) . '/../layout/footer.php'; ?>
 //10:40 