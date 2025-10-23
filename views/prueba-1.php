<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>lista de las marcas</h1>
    <ul>
        <?php foreach ($marcas as $marca): ?>
            <li> <?php echo htmlspecialchars($marca['nombreMarca']); ?></li>

        <?php endforeach; ?>
    </ul>
</body>
</html>