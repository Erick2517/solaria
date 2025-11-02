<?php
require_once __DIR__ . '/../models/ProductoModel.php';
require_once __DIR__ . '/../helpers/config.php';

class ProductoController {
    private $productoModel;

    public function __construct() {
        $this->productoModel = new ProductoModel();
    }

    public function index() {
        $productos = $this->productoModel->verProductos();
        require_once VIEWS_PATH . 'productos/panelProductos.php';
    }
public function guardar() {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: ' . BASE_URL . 'producto/nuevo'); return;
    }

    $nombreProducto = trim($_POST['nombreProducto'] ?? '');
    $descripcion    = trim($_POST['descripcion'] ?? '');
    $categoriaId    = (int)($_POST['categoriaId'] ?? 0);
    $marcaId        = (int)($_POST['marcaId'] ?? 0);
    $precioUnitario = (float)($_POST['precioUnitario'] ?? 0);
    $tiempoGarantia = (int)($_POST['tiempoGarantia'] ?? 0);
    $fechaFab       = $_POST['fechaFab'] ?? null;
    $existente      = isset($_POST['existente']) ? 1 : 0;

    if ($nombreProducto === '') {
        $_SESSION['mensaje'] = 'El nombre del producto es obligatorio.';
        header('Location: ' . BASE_URL . 'producto/nuevo'); return;
    }

    $ok = $this->productoModel->insertar(
        $nombreProducto,
        $descripcion,
        $categoriaId,
        $marcaId,
        $precioUnitario,
        $tiempoGarantia,
        $fechaFab,
        $existente
    );

    $_SESSION['mensaje'] = $ok ? 'Producto creado.' : 'Error al crear producto.';
    header('Location: ' . BASE_URL . 'producto');
}
public function insertar(
    string $nombreProducto,
    ?string $descripcion,
    int $categoriaId,
    int $marcaId,
    float $precioUnitario,
    int $tiempoGarantia,
    string $fechaFab,
    int $existente
) {
    $sql = "INSERT INTO productos
            (nombreProducto, descripcion, categoriaId, marcaId, precioUnitario, tiempoGarantia, fechaFab, existente)
            VALUES
            (:nombreProducto, :descripcion, :categoriaId, :marcaId, :precioUnitario, :tiempoGarantia, :fechaFab, :existente)";
    $cmd = $this->cx->prepare($sql);
    return $cmd->execute([
        ':nombreProducto' => $nombreProducto,
        ':descripcion'    => $descripcion,
        ':categoriaId'    => $categoriaId,
        ':marcaId'        => $marcaId,
        ':precioUnitario' => $precioUnitario,
        ':tiempoGarantia' => $tiempoGarantia,
        ':fechaFab'       => $fechaFab,
        ':existente'      => $existente
    ]);
}
public function nuevo() {
    // Cargar modelos necesarios
    require_once __DIR__ . '/../models/CategoriaModel.php';
    require_once __DIR__ . '/../models/MarcaModel.php';

    // Crear instancias
    $categoriaModel = new CategoriaModel();
    $marcaModel = new MarcaModel();

    // Obtener listas para los select
    $categorias = $categoriaModel->verCategorias();
    $marcas = $marcaModel->verMarcas();

    // Modo de formulario
    $modo = 'crear';

    // Cargar la vista del formulario
    require_once VIEWS_PATH . 'productos/formNuevoProducto.php';
}
    // también puede existir:
    public function listarProductos() {
        $this->index();
    }
}
