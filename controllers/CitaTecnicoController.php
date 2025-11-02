<?php
require_once('models/CitaTecnicoModel.php');

class CitaTecnicoController {
    private $model;

    public function __construct() {
        $this->model = new CitaTecnicoModel();
    }

    public function listar() {
        $relaciones = $this->model->listarCitasTecnicos();
        include VIEWS_PATH.'citatecnicos/lista.php';
    }

    public function crear() {
        $tecnicos = $this->model->listarTecnicos();
        $citas = $this->model->listarCitas();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tecnicoId = $_POST['tecnicoId'];
            $citaId = $_POST['citaId'];

            $this->model->crearRelacion($tecnicoId, $citaId);
            header("Location: index.php?mod=citastecnicos&action=listar");
            exit;
        }

        include VIEWS_PATH.'itastecnicos/formulario.php';
    }

    public function eliminar() {
        if (isset($_GET['id'])) {
            $this->model->eliminarRelacion($_GET['id']);
            header("Location: index.php?mod=citastecnicos&action=listar");
            exit;
        }
    }
}
?>
