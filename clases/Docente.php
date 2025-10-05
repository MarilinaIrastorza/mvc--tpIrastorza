<?php
require_once(__DIR__ . "/DBController.php");

class Docente {
    private $db_handle;

    public function __construct() {
        $this->db_handle = new DBController();
    }

    public function getAllDocente() {
        $sql = "SELECT * FROM .docentes ORDER BY id";
        return $this->db_handle->runBaseQuery($sql);
    }

     }
?>