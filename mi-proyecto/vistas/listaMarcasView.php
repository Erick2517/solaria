<?php
// vistas/listaMarcasView.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Marcas</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h1 { color: #333; }
        ul { list-style-type: square; }
        li { background-color: #f4f4f4; margin: 5px; padding: 10px; border-radius: 4px; }
    </style>
</head>
<body>

    <h1>Marcas Registradas</h1>
    
    <ul>
        <?php foreach ($marcas as $marca): ?>
        
            <li>
                <strong>ID:</strong> <?php echo $marca['marcaId']; ?> | 
                <strong>Nombre:</strong> <?php echo $marca['nombreMarca']; ?>
            </li>
            
        <?php endforeach; ?>
    </ul>
    
    <br>
    <a href="index.php">Volver al inicio</a>

</body>
</html>