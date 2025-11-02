<?php
require_once __DIR__ . '/conexion.php';

class MarcaModel extends Conexion {
    private $db;
    private $table = 'marcas';

    public function __construct() {
        parent::__construct();
        $this->db = $this->getConexion();
    }

    public function verMarcas(): array {
        $sql = "SELECT marcaId, nombreMarca FROM {$this->table} ORDER BY marcaId DESC";
        $cmd = $this->db->prepare($sql);
        $cmd->execute();
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar(string $nombre): bool {
        $sql = "INSERT INTO {$this->table}(nombreMarca) VALUES(:n)";
        $cmd  = $this->db->prepare($sql);
        return $cmd->execute([':n'=>$nombre]);
    }

    public function obtenerPorId(int $id): ?array {
        $sql = "SELECT * FROM {$this->table} WHERE marcaId=:id";
        $cmd = $this->db->prepare($sql);
        $cmd->execute([':id'=>$id]);
        $row = $cmd->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    public function actualizar(int $id, string $nombre): bool {
        $sql = "UPDATE {$this->table} SET nombreMarca=:n WHERE marcaId=:id";
        $cmd = $this->db->prepare($sql);
        return $cmd->execute([':n'=>$nombre, ':id'=>$id]);
    }
}
// ultimo cambio 10:34
