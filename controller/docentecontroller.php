<?php
require_once 'model/docente.php';

class docenteController {
    public $view;

    public function listado() {
        $this->view = 'docente/listado';
        $docentes = Docente::listar();
        return ['docentes' => $docentes];
    }

    public function verPerfil() {
        $this->view = 'docente/perfil';
        $id = $_GET['id'];
        $docente = Docente::buscarPorId($id);
        return ['docente' => $docente];
    }
}
?>