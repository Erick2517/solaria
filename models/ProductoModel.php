<?php
require_once 'conexion.php';

class ProductoModel extends Conexion
{
    private $cx;

    public function __construct()
    {
        parent::__construct();
        $this->conexion = $this->getConexion();
    }

    public function insertar(
        string $nombre_producto,
        ?string $desc_producto,
        int $categoriaId,
        int $marcaId,
        float $precioUnitario,
        int $tiempoGarantia,
        string $fechaFab,
        int $existente
    ) {
        $sql = "INSERT INTO productos
            (nombre_producto, desc_producto, categoriaId, marcaId, precioUnitario, tiempoGarantia, fechaFab, existente)
            VALUES
            (:nombre_producto, :desc_producto, :categoriaId, :marcaId, :precioUnitario, :tiempoGarantia, :fechaFab, :existente)";
        $cmd = $this->conexion->prepare($sql);
        return $cmd->execute([
            ':nombre_producto' => $nombre_producto,
            ':desc_producto'    => $desc_producto,
            ':categoriaId'    => $categoriaId,
            ':marcaId'        => $marcaId,
            ':precioUnitario' => $precioUnitario,
            ':tiempoGarantia' => $tiempoGarantia,
            ':fechaFab'       => $fechaFab,
            ':existente'      => $existente
        ]);
    }
    public function verProductos(): array
    {
        // Alias para mantener compatible el controlador
        return $this->listarConJoins();
    }
    public function listarConJoins(): array
    {
        $sql = "SELECT 
                p.productoId,
                p.nombre_producto,
                p.desc_producto,
                c.nombreCat AS categoria,
                m.nombreMarca AS marca,
                p.precioUnitario AS precio,
                p.tiempoGarantia AS garantia,
                p.fechaFab AS fechaFabricacion,
                p.existente AS disponible
            FROM productos p
            JOIN categorias c ON c.categoriaId = p.categoriaId
            JOIN marcas m     ON m.marcaId     = p.marcaId
            ORDER BY p.productoId DESC";
        $cmd = $this->conexion->prepare($sql);   // <— AQUÍ usamos $this->conexion
        $cmd->execute();
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerTodos()
    {
        // Para listado bonito con nombres de categoría y marca
        $sql = "SELECT p.productoId, p.precioUnitario, p.tiempoGarantia, p.fechaFab, p.existente,
                       c.nombreCat  AS categoria,
                       m.nombreMarca AS marca
                FROM productos p
                INNER JOIN categorias c ON p.categoriaId = c.categoriaId
                INNER JOIN marcas     m ON p.marcaId     = m.marcaId
                ORDER BY p.productoId DESC";
        $cmd = $this->conexion->prepare($sql);
        $cmd->execute();
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }
}
