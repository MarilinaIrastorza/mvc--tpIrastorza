<?php require_once ("controller/DBController.php");
class Alumno {
    public function listar() {
        $db = (new DB())->connect();

        if (!$db) {
            die("Error de conexión a la base de datos.");
        }

        $result = $db->query("SELECT * FROM tbl_estudiante");

        if (!$result) {
            die("Error en la consulta: " . $db->error);
        }

        $tbl_estudiante = [];
        while ($row = $result->fetch_assoc()) {
            $tbl_estudiante[] = $row;
        }

        return $tbl_estudiante;
    }
}
?>