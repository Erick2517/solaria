<?php
// views/layout/sidebar.php
?>
<aside class="sidebar">
    <h5 class="mb-3">Navegación</h5>
    <ul class="sidebar-nav-list">
        <li><a href="<?php echo BASE_URL; ?>">Inicio</a></li>
        <?php if (isset($_SESSION["username"])) {
        ?>
            <li><a href="<?php echo BASE_URL; ?>cliente/mostrarPanelClientes">Clientes</a></li>
            <li><a href="<?= BASE_URL ?>producto">Productos</a></li>
            <li><a href="<?php echo BASE_URL; ?>ventas/listarVentas">Ventas</a></li>
            <li><a href="<?php echo BASE_URL; ?>categoria/listarCategorias">Categorías</a></li>
            <li><a href="<?php echo BASE_URL; ?>marca/listarMarcas">Marcas</a></li>
        <?php
        } else {
        ?>
            <li><a href="<?php echo BASE_URL; ?>login">Login</a></li>
        <?php } ?>
    </ul>
</aside>