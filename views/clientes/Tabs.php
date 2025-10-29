<div class="tabs-wrapper mt-4">
    <ul class="nav nav-tabs" id="clienteTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="bienvenida-tab" data-bs-toggle="tab" href="#bienvenida" role="tab" aria-controls="bienvenida" aria-selected="true">Bienvenido</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="clientes-mis-instalaciones-tab" data-bs-toggle="tab" href="#clientes-mis-instalaciones" role="tab" aria-controls="clientes-mis-instalaciones" aria-selected="false">Instalacion solar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="compras-tab" data-bs-toggle="tab" href="#compras" role="tab" aria-controls="compras" aria-selected="false">Mis Compras</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="clientes-tab" data-bs-toggle="tab" href="#clientes" role="tab" aria-controls="clientes" aria-selected="false">Clientes</a>
        </li>
    </ul>
    <div class="tab-content" id="clienteTabsContent">
        <div class="tab-pane fade show active" id="bienvenida" role="tabpanel" aria-labelledby="bienvenida-tab">
            <h4>Bienvenido a tu panel de cliente</h4>
            <p>Aquí puedes gestionar tus datos y servicios.</p>
            <?php require_once(VIEWS_PATH.'clientes/bienvenida.php'); ?>
        </div>
        <div class="tab-pane fade" id="clientes-mis-instalaciones" role="tabpanel" aria-labelledby="clientes-mis-instalaciones-tab">
            <h4>instalaciones</h4>
            <p>Los detalles sobre instalaciones aparecerán aquí.</p>
            <?php require_once(VIEWS_PATH.'clientes/instalacionesClientesView.php'); ?>
        </div>
        <div class="tab-pane fade" id="compras" role="tabpanel" aria-labelledby="compras-tab">
            <?php require_once(VIEWS_PATH . 'clientes/tablaCompras.php'); ?>
        </div>
        <div class="tab-pane fade" id="clientes" role="tabpanel" aria-labelledby="clientes-tab">
            <?php require_once(VIEWS_PATH . 'clientes/mostrarClientes.php'); ?>
        </div>
    </div>
</div>