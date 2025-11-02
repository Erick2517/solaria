<?php
// Rutas seguras
require_once __DIR__ . '/../models/CategoriaModel.php';
require_once __DIR__ . '/../helpers/config.php';

class CategoriaController {
    private $categoriaModel;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        $this->categoriaModel = new CategoriaModel();
    }

    // puedes usar /categoria o /categoria/listarCategorias
    public function index() {
        $categorias = $this->categoriaModel->verCategorias();
        require_once VIEWS_PATH . 'categorias/panelCategorias.php';
    }

    public function listarCategorias() {
        $this->index();
    }

    public function nuevo() {
        require_once VIEWS_PATH . 'categorias/formNuevaCategoria.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . 'categoria');
            return;
        }

        $nombre = trim($_POST['nombreCat'] ?? '');
        $desc   = trim($_POST['descripcion'] ?? '');

        if ($nombre === '') {
            $_SESSION['mensaje'] = 'El nombre es obligatorio.';
            header('Location: ' . BASE_URL . 'categoria/nuevo');
            return;
        }

        $ok = $this->categoriaModel->insertar($nombre, $desc);

        $_SESSION['mensaje'] = $ok
            ? 'Categoría creada correctamente.'
            : 'Error al crear categoría.';

        header('Location: ' . BASE_URL . 'categoria');
    }

    public function editar($id) {
        $categoria = $this->categoriaModel->obtenerPorId((int)$id);
        if (!$categoria) { echo 'Categoría no encontrada.'; return; }
        require_once VIEWS_PATH . 'categorias/formEditarCategoria.php';
    }

    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . 'categoria');
            return;
        }

        $id          = (int)($_POST['categoriaId'] ?? 0);
        $nombreCat   = trim($_POST['nombreCat'] ?? '');
        $descripcion = trim($_POST['descripcion'] ?? '');

        if (!$id || $nombreCat === '') {
            echo 'Datos inválidos.'; return;
        }

        $ok = $this->categoriaModel->actualizar($id, $nombreCat, $descripcion);

        $_SESSION['mensaje'] = $ok ? 'Categoría actualizada.' : 'Error al actualizar.';
        header('Location: ' . BASE_URL . 'categoria');
    }
}
