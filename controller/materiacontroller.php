<?php
require_once 'model/materia.php';

class materiaController {
    public $view;

    public function listado() {
        $this->view = 'materia/listado';
        $materias = Materia::listar();
        return ['materias' => $materias];
    }
    
    public function verPorCurso() {
    $this->view = 'materia/porCurso';
    $cursoId = $_GET['curso_id'];
    $materias = Materia::listarPorCurso($cursoId);
    return ['materias' => $materias];
}
}
?>