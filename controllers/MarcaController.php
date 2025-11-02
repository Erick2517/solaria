<?php
require_once __DIR__ . '/../models/MarcaModel.php';

class MarcaController {
    private $model;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        $this->model = new MarcaModel();
    }

    // GET /marca  (o /marca/listarMarcas)
    public function index() {          // /marca  o /marca/listarMarcas
    $marcas = $this->model->verMarcas();
    require_once VIEWS_PATH . 'marcas/panelMarcas.php';
}
public function listarMarcas() { $this->index(); }

public function nuevo() {          // /marca/nuevo
    require_once VIEWS_PATH . 'marcas/formNuevaMarca.php';
}

public function guardar() {        // POST /marca/guardar
    $nombre = trim($_POST['nombreMarca'] ?? '');
    $_SESSION['mensaje'] = $this->model->insertar($nombre)
        ? 'Marca creada correctamente.' : 'Error al crear marca.';
    header('Location: ' . BASE_URL . 'marca');
}

public function editar($id) {      // /marca/editar/{id}
    $marca = $this->model->obtenerPorId((int)$id);
    require_once VIEWS_PATH . 'marcas/formEditarMarca.php';
}

public function actualizar() {     // POST /marca/actualizar
    $id = (int)($_POST['marcaId'] ?? 0);
    $nombre = trim($_POST['nombreMarca'] ?? '');
    $_SESSION['mensaje'] = $this->model->actualizar($id, $nombre)
        ? 'Marca actualizada.' : 'Error al actualizar.';
    header('Location: ' . BASE_URL . 'marca');
}
}
// ultimo cambio 12:29

