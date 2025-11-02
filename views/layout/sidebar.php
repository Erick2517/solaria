<?php
// views/layout/sidebar.php
?>
<aside class="sidebar">
    <h5 class="mb-3">Navegación</h5>
    <ul class="sidebar-nav-list">
        <li><a href="<?php echo BASE_URL; ?>">Inicio</a></li>
        <li><a href="<?php echo BASE_URL; ?>categoria/listarCategorias">Categorías</a></li>
        <li><a href="<?php echo BASE_URL; ?>marca/listarMarcas">Marcas</a></li>
        <li><a href="<?php echo BASE_URL; ?>cliente/mostrarPanelClientes">Clientes</a></li>
        <li><a href="<?php echo BASE_URL; ?>instalacion/panelInstalaciones">Instalaciones</a></li>
        <li><a href="<?= BASE_URL ?>producto">Productos</a></li>
        <li><a href="<?php echo BASE_URL; ?>ventas/listarVentas">Ventas</a></li>
        <li><a href="#">Citas</a></li>
        <li><a href="#">Presupuesto</a></li>
        <li><a href="#">Envíos</a></li>
        <li><a href="#">Repartidores</a></li>
        <li><a href="#">Pagos</a></li>
        <li><a href="#">Usuarios</a></li>
        <li><a href="#">Método de pago</a></li>
    </ul>
</aside>