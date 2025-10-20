<?php
// modelos/MarcaModel.php

class MarcaModel {
    
    private $db; // Para guardar la conexión PDO

    /**
     * El constructor recibe la conexión PDO y la guarda.
     */
    public function __construct($pdo_conexion) {
        $this->db = $pdo_conexion;
    }

    /**
     * Obtiene todas las marcas de la base de datos.
     */
    public function obtenerMarcas() {
        
        // 1. Preparamos la consulta SQL
        $sql = "SELECT marcaId, nombreMarca FROM marcas";
        
        // 2. Preparamos la consulta con PDO
        $stmt = $this->db->prepare($sql);
        
        // 3. Ejecutamos la consulta
        $stmt->execute();
        
        // 4. Obtenemos TODOS los resultados como un array asociativo
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultados;
    }
}
?>