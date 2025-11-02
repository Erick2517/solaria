<?php require_once dirname(__FILE__).'/../../helpers/config.php'; ?>
<?php require_once dirname(__FILE__).'/../layout/header.php'; ?>

<div class="container py-4">
  <h3 class="mb-3">Nuevo producto</h3>
  <form method="post" action="<?php echo BASE_URL; ?>producto/guardar" class="card shadow-sm">
    <div class="card-body row g-3">
      <div class="col-md-6">
        <label class="form-label">Categoría</label>
        <select name="categoriaId" class="form-select" required>
          <option value="">Seleccione…</option>
          <?php foreach($categorias as $c): ?>
            <option value="<?php echo (int)$c['categoriaId']; ?>"><?php echo htmlspecialchars($c['nombreCat']); ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-md-6">
        <label class="form-label">Marca</label>
        <select name="marcaId" class="form-select" required>
          <option value="">Seleccione…</option>
          <?php foreach($marcas as $m): ?>
            <option value="<?php echo (int)$m['marcaId']; ?>"><?php echo htmlspecialchars($m['nombreMarca']); ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-md-4">
        <label class="form-label">Precio unitario</label>
        <input type="number" step="0.01" min="0" name="precioUnitario" class="form-control" required>
      </div>

      <div class="col-md-4">
        <label class="form-label">Tiempo de garantía</label>
        <input type="text" name="tiempoGarantia" class="form-control" placeholder="Ej: 10" required>
      </div>

      <div class="col-md-4">
        <label class="form-label">Fecha de fabricación</label>
        <input type="date" name="fechaFab" class="form-control" required>
      </div>

      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="1" id="existe" name="existente" checked>
          <label class="form-check-label" for="existe">Disponible (existente)</label>
        </div>
      </div>
    </div>

    <div class="card-footer d-flex justify-content-end gap-2">
      <a href="<?php echo BASE_URL; ?>producto/panelProductos" class="btn btn-outline-secondary">Cancelar</a>
      <button class="btn btn-success" type="submit">Guardar</button>
    </div>
  </form>
</div>

<?php require_once dirname(__FILE__).'/../layout/footer.php'; ?>
