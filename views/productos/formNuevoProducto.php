<?php
require_once dirname(__FILE__).'/../layout/header.php';

// Asegura variables
$producto = $producto ?? [];
$categorias = $categorias ?? [];
$marcas = $marcas ?? [];
$modo = $modo ?? 'crear';

$isEdit = ($modo === 'editar' && !empty($producto['productoId']));

$action = $isEdit
  ? BASE_URL.'producto/actualizar'
  : BASE_URL.'producto/guardar';

// helper para valores seguros
$val = function($key, $default='') use ($producto) {
  return isset($producto[$key]) ? htmlspecialchars((string)$producto[$key]) : $default;
};

?>
<div class="container py-4">
  <h3 class="mb-3"><?= $isEdit ? 'Editar producto' : 'Nuevo producto' ?></h3>

<form method="POST" action="<?= BASE_URL ?>producto/guardar">

    <div class="card-body row g-3">

      <?php if ($isEdit): ?>
        <input type="hidden" name="productoId" value="<?= (int)$producto['productoId'] ?>">
      <?php endif; ?>
     <div class="col-md-6">
        <label class="form-label">Nombre del producto *</label>
        <input type="text" name="nombreProducto" class="form-control"
               required value="<?= $val('nombreProducto') ?>">
      </div>

      <!-- Descripción -->
      <div class="col-md-6">
        <label class="form-label">Descripción</label>
        <input type="text" name="descripcion" class="form-control"
               value="<?= $val('descripcion') ?>">
      </div>
      <div class="col-md-6">
        <label class="form-label">Categoría</label>
        <select name="categoriaId" class="form-select" required>
          <option value="">Seleccione…</option>
          <?php foreach ($categorias as $c): ?>
            <option value="<?= (int)$c['categoriaId'] ?>"
              <?= ((string)$c['categoriaId'] === (string)$val('categoriaId')) ? 'selected' : '' ?>>
              <?= htmlspecialchars($c['nombreCat']) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-md-6">
        <label class="form-label">Marca</label>
        <select name="marcaId" class="form-select" required>
          <option value="">Seleccione…</option>
          <?php foreach ($marcas as $m): ?>
            <option value="<?= (int)$m['marcaId'] ?>"
              <?= ((string)$m['marcaId'] === (string)$val('marcaId')) ? 'selected' : '' ?>>
              <?= htmlspecialchars($m['nombreMarca']) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-md-4">
        <label class="form-label">Precio unitario</label>
        <input type="number" step="0.01" min="0" name="precioUnitario"
               class="form-control" required
               value="<?= $val('precioUnitario') ?>">
      </div>

      <div class="col-md-4">
        <label class="form-label">Tiempo de garantía</label>
        <input type="text" name="tiempoGarantia" class="form-control"
               placeholder="Ej: 10" required
               value="<?= $val('tiempoGarantia') ?>">
      </div>

      <div class="col-md-4">
        <label class="form-label">Fecha de fabricación</label>
        <input type="date" name="fechaFab" class="form-control" required
               value="<?= $val('fechaFab') ?>">
      </div>

      <div class="col-12">
        <div class="form-check">
          <?php $chk = ((int)($producto['existente'] ?? 1) === 1) ? 'checked' : ''; ?>
          <input class="form-check-input" type="checkbox" id="existe" name="existente" value="1" <?= $chk ?>>
          <label class="form-check-label" for="existe">Disponible (existente)</label>
        </div>
      </div>
    </div>

    <div class="card-footer d-flex justify-content-end gap-2">
      <a href="<?= BASE_URL ?>producto" class="btn btn-outline-secondary">Cancelar</a>
      <button class="btn btn-success" type="submit">
        <?= $isEdit ? 'Guardar cambios' : 'Guardar' ?>
      </button>
    </div>
  </form>
</div>

<?php require_once dirname(__FILE__).'/../layout/footer.php'; ?>
