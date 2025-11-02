<?php
require_once __DIR__ . '/../helpers/config.php';

class PanelController {
    public function detalleResidencial() {
        require_once VIEWS_PATH . 'paneles/detalleResidencial.php';
    }

    public function detalleEmpresarial() {
        require_once VIEWS_PATH . 'paneles/detalleEmpresarial.php';
    }

    public function detalleComercial() {
        require_once VIEWS_PATH . 'paneles/detalleComercial.php';
    }
}

