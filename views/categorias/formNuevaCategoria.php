<?php require_once dirname(__FILE__) . '/../layout/header.php'; ?>

<h2>Nueva categoría</h2>

<form action="<?= BASE_URL ?>categoria/guardar" method="post" class="mt-3" autocomplete="off">
  <div class="mb-3">
    <label class="form-label">Nombre de la categoría</label>
    <input type="text" name="nombreCat" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Descripción</label>
    <textarea name="descripcion" class="form-control" rows="3"></textarea>
  </div>

  <div class="d-flex gap-2">
    <a href="<?= BASE_URL ?>categoria" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-success">Guardar</button>
  </div>
</form>

<?php require_once dirname(__FILE__) . '/../layout/footer.php'; ?>
