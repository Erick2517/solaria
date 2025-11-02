<?php
// views/layout/header.php
require_once('helpers/config.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['titulo'] ?? 'Solaria'; // Título dinámico ?></title>
    <link rel="icon" href="<?php echo BASE_URL . 'images/ver/favicon.ico' ?>" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 240px;
            background-color: #fff;
            border-right: 1px solid #dee2e6;
            padding: 20px;
        }
        .sidebar-nav-list {
            list-style: none;
            padding-left: 0;
        }
        .sidebar-nav-list li {
            margin-bottom: 10px;
        }
        .sidebar-nav-list a {
            text-decoration: none;
            color: #333;
            display: block;
            padding: 8px 12px;
            border-radius: 6px;
        }
        .sidebar-nav-list a:hover, .sidebar-nav-list a.active {
            background-color: #e9ecef;
            color: #000;
        }
        .top-bar {
            background-color: #fff;
            border-bottom: 1px solid #dee2e6;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .content-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex-grow: 1;
            padding: 25px;
        }
        .card-form { /* Estilo para los formularios (basado en tu imagen) */
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 25px;
            max-width: 800px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .footer {
            background-color: #fff;
            border-top: 1px solid #dee2e6;
            padding: 20px;
            text-align: center;
            color: #6c757d;
            font-size: 0.9em;
        }

        .LogoMenu {
            width: 45px;
            height: 45px;
        }
    </style>
</head>
<body>

<div class="content-wrapper">
    <header class="top-bar">
        <div class="d-flex align-items-center">
            <img src="<?php echo BASE_URL . 'images/ver/panel.png'?>" alt="Logo" class="me-2 LogoMenu"> <span class="fs-5 fw-bold">Panel de solaria</span>
        </div>
        <div class="fs-5">
            Admin
        </div>
    </header>

    <div class="dashboard-container">
        <?php require_once(VIEWS_PATH . 'layout/sidebar.php'); ?>
        <main class="content">