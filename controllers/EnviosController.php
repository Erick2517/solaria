<?php
require_once 'models/EnviosModel.php';

class EnviosController {
  private $model;
  public function __construct() {
    $this->model = new EnviosModel(); 
  }

  public function index() {
    $envios = $this->model->listarEnvios();
    require_once VIEWS_PATH . 'envios/listado.php';
  }

  public function nuevo() {
    $repartidores = $this->model->listarRepartidores();
    require_once VIEWS_PATH . 'envios/nuevo.php';
  }

  public function guardar() {
    $id = $this->model->agregarEnvio(
      (int)$_POST['ventaId'],
      (int)$_POST['repartidorId'],
      (float)$_POST['costoEnvio'],
      $_POST['direccionEntrega'] ?? null,
      $_POST['fechaPaqueteRecibido'] ?: null,
      $_POST['fechaPaqueteEntregado'] ?: null
    );
    $_SESSION['mensaje'] = $id ? "Envío #$id creado" : "No se pudo crear el envío";
    header('Location: '.BASE_URL.'envios/index');
  }

  public function cambiarEstado() {
    $ok = $this->model->actualizarEstado((int)$_POST['envioId'], $_POST['estado']);
    $_SESSION['mensaje'] = $ok ? 'Estado actualizado' : 'No se pudo actualizar';
    header('Location: '.BASE_URL.'envios/index');
  }
}
