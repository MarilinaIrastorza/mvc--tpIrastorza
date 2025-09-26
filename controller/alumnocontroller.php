<?php
require_once 'model/alumno.php';

class alumnoController {
    public $view;

    public function listado() {
        $this->view = 'alumno/listado';
        $alumnos = Alumno::listar();
        return ['alumnos' => $alumnos];
    }

    public function verPerfil() {
        $this->view = 'alumno/perfil';
        $id = $_GET['id'];
        $alumno = Alumno::buscarPorId($id);
        return ['alumno' => $alumno];
    }
}
?>