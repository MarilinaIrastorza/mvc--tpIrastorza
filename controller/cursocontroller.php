<?php
require_once 'model/curso.php';

class cursoController {
    public $view;

    public function listado() {
        $this->view = 'curso/listado';
        $cursoModel = new Curso();
        $cursos = $cursoModel->listar();
        return ['cursos' => $cursos];
    }

    public function detalle() {
        $this->view = 'curso/detalle';
        $id = $_GET['id'];
        $cursoModel = new Curso();
        $curso = $cursoModel->detalle($id);
        return ['curso' => $curso];
    }
}
?>