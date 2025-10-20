<?php
// config/database.php

function conectarDB() {
    $servidor = "localhost";
    $dbNombre = "solaria"; // El nombre de tu base de datos
    $usuario = "root";       // Usuario por defecto de XAMPP
    $password = "";          // Contraseña por defecto de XAMPP
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$servidor;dbname=$dbNombre;charset=$charset";

    try {
        // Creamos la conexión PDO
        $pdo = new PDO($dsn, $usuario, $password);
        
        // Configuramos PDO para que lance excepciones si hay errores
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $pdo;

    } catch (PDOException $e) {
        // Si la conexión falla, detenemos todo y mostramos el error
        echo "Error de conexión: " . $e->getMessage();
        exit();
    }
}
?>