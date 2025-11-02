<?php require_once dirname(__FILE__) . '/../layout/header.php'; ?>

<h2>Nueva marca</h2>

<form action="<?= BASE_URL ?>marca/guardar" method="post" class="mt-3" autocomplete="off">
  <div class="mb-3">
    <label class="form-label">Nombre de la marca</label>
    <input type="text" name="nombreMarca" class="form-control" required>
  </div>
  <div class="d-flex gap-2">
    <a href="<?= BASE_URL ?>marca" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-success">Guardar</button>
  </div>
</form>

<?php require_once dirname(__FILE__) . '/../layout/footer.php'; ?>
