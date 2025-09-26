<?php
require_once 'model/asistencia.php';

class asistenciaController {
    public $view;

    public function verPorAlumno() {
        $this->view = 'asistencia/verPorAlumno';
        $id = $_GET['id'];
        $asistencias = Asistencia::listarPorAlumno($id);
        return ['asistencias' => $asistencias];
    }
}
?>