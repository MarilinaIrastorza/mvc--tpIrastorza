<?php
require_once 'model/curso.php';

class cursoController {
    public $view;

    public function listado() {
        $this->view = 'curso/listado';
        $cursos = Curso::listar();
        return ['cursos' => $cursos];
    }

    public function detalle() {
        $this->view = 'curso/detalle';
        $id = $_GET['id'];
        $curso = Curso::detalle($id);
        return ['curso' => $curso];
    }
}
?>