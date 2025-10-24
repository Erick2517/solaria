<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Documento</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['clientes'] as $cliente): ?>
                <tr>
                    <td><?php echo $cliente['clienteId']; ?></td>
                    <td><?php echo $cliente['nombres']; ?></td>
                    <td><?php echo $cliente['apellidos']; ?></td>
                    <td><?php echo $cliente['numDocumentoId']; ?></td>
                    
                    <td><?php echo $cliente['telefonoContacto']; ?></td>
                    
                    <td><?php echo $cliente['email']; ?></td>
                    <td>
                        <a href="<?php echo BASE_URL; ?>cliente/mostrarFormularioEditar/<?php echo $cliente['clienteId']; ?>" class="btn btn-warning btn-sm">
                            Editar
                        </a>
                        <a href="<?php echo BASE_URL; ?>cliente/eliminar/<?php echo $cliente['clienteId']; ?>" 
                           class="btn btn-danger btn-sm" 
                           onclick="return confirm('quiere desactivar este cliente?');">
                            Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



<?php
//la ventaja es volver a usar el footer en todas las paginas
require_once(VIEWS_PATH.'layout/footer.php');
?>