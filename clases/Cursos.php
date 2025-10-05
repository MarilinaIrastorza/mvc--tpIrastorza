<?php
require_once(__DIR__ . "/DBController.php");

class Curso {
    private $db_handle;

    public function __construct() {
        $this->db_handle = new DBController();
    }

    public function getAllCurso() {
        $sql = "SELECT * FROM .cursos ORDER BY id";
        return $this->db_handle->runBaseQuery($sql);
    }

  
}
?>