<?php
require_once __DIR__ . '/conexion.php';  // <-- misma carpeta 'models'

class CategoriaModel extends Conexion {
    private $conexion;
    private $table = 'categorias';

    public function __construct() {
        parent::__construct();
        $this->conexion = $this->getConexion();
    }

    public function verCategorias(){
        try {
            $sql = "SELECT * FROM {$this->table}";
            $cmd = $this->conexion->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error al obtener las categorias: " . $e->getMessage();
            return [];
        }
    }

    public function insertar(string $nombre, string $descripcion): bool {
        $sql = "INSERT INTO {$this->table}(nombreCat, descripcion) VALUES(:n, :d)";
        $cmd = $this->conexion->prepare($sql);
        return $cmd->execute([':n'=>$nombre, ':d'=>$descripcion]);
    }

    public function obtenerPorId(int $id): ?array {
        $sql = "SELECT * FROM {$this->table} WHERE categoriaId=:id";
        $cmd = $this->conexion->prepare($sql);
        $cmd->execute([':id'=>$id]);
        $row = $cmd->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    public function actualizar(int $id, string $nombre, string $descripcion): bool {
        $sql = "UPDATE {$this->table} SET nombreCat=:n, descripcion=:d WHERE categoriaId=:id";
        $cmd = $this->conexion->prepare($sql);
        return $cmd->execute([':n'=>$nombre, ':d'=>$descripcion, ':id'=>$id]);
    }
}
// ultimo cambio 10:11
