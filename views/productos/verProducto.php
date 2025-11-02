<title><?='Producto #'.intval($producto['productoId'])?> | Solaria</title>
<h1 class="h4 mb-2"><?='Producto #'.intval($producto['productoId'])?></h1>
<ul class="list-unstyled small">
  <li><b>CategoriaID:</b> <?=intval($producto['categoriaId'])?></li>
  <li><b>MarcaID:</b> <?=intval($producto['marcaId'])?></li>
  <li><b>PrecioUnitario:</b> $<?=number_format($producto['precioUnitario'],2)?></li>
  <li><b>TiempoGarantia:</b> <?=htmlspecialchars($producto['tiempoGarantia'])?></li>
  <li><b>FechaFab:</b> <?=htmlspecialchars($producto['fechaFab'])?></li>
  <li><b>Existente:</b> <?=!empty($producto['existente'])?'true':'false'?></li>
</ul>
