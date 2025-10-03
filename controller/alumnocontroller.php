<?php
require_once 'model/alumno.php';
require_once 'model/student.php';

class alumnoController {
    public $view;

    public function listado() {
        $this->view = 'alumno/listado';
        $alumnoModel = new Alumno();
        $nombres = $alumnoModel->listar();
        return ['nombres' => $nombres];
    }
}

?>