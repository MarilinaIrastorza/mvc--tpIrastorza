<?php
require_once 'model/docente.php';

class docenteController {
    public $view;

    public function listado() {
        $this->view = 'docente/listado';
        $docenteModel = new Docente();
        $docentes = $docenteModel->listar(); // ← si listar() no es static
        return ['docentes' => $docentes];
    }
}
?>