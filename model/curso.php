<?php require_once ("controller/DBController.php");
class Curso {
    public function listar() {
        $db = new DB();
        $conn = $db->connect();

        if (!$conn) {
            die("Error de conexión a la base de datos.");
        }

        $result = $conn->query("SELECT * FROM cursos");

        if (!$result) {
            die("Error en la consulta SQL: " . $conn->error);
        }

        $cursos = [];
        while ($row = $result->fetch_assoc()) {
            $cursos[] = $row;
        }

        return $cursos;
    }
}
?>