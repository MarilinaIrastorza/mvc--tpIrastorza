<?php
require_once(__DIR__ . "/DBController.php");

class Student {
    private $db_handle;

    public function __construct() {
        $this->db_handle = new DBController();
    }

    public function addStudent($name, $roll_number, $dob, $class) {
        $query = "INSERT INTO tbl_estudiante (nombres, rol_numero, fecha_estudiante, clase) VALUES (?, ?, ?, ?)";
        $paramType = "siss";
        $paramValue = [$name, $roll_number, $dob, $class];
        return $this->db_handle->insert($query, $paramType, $paramValue);
    }

    public function editStudent($name, $roll_number, $dob, $class, $student_id) {
        $query = "UPDATE tbl_estudiante SET nombres = ?, rol_numero = ?, fecha_estudiante = ?, clase = ? WHERE id = ?";
        $paramType = "sissi";
        $paramValue = [$name, $roll_number, $dob, $class, $student_id];
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    public function deleteStudent($student_id) {
        $query = "DELETE FROM tbl_estudiante WHERE id = ?";
        $paramType = "i";
        $paramValue = [$student_id];
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    public function getStudentById($student_id) {
        $query = "SELECT * FROM tbl_estudiante WHERE id = ?";
        $paramType = "i";
        $paramValue = [$student_id];
        return $this->db_handle->runQuery($query, $paramType, $paramValue);
    }

    public function getAllStudent() {
        $sql = "SELECT * FROM tbl_estudiante ORDER BY id";
        return $this->db_handle->runBaseQuery($sql);
    }
}
?>