<?php
require_once 'model/materia.php';

class materiaController {
    public $view;

    public function listado() {
        $this->view = 'materia/listado';
        $materiaModel = new Materia();
        $materias = $materiaModel->listar();
        return ['materias' => $materias];
    }
}
?>