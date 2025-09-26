<?php
require_once 'model/evaluacion.php';

class evaluacionController {
    public $view;

    public function verPorAlumno() {
        $this->view = 'evaluacion/verPorAlumno';
        $id = $_GET['id'];
        $evaluaciones = Evaluacion::listarPorAlumno($id);
        return ['evaluaciones' => $evaluaciones];
    }
}
?>