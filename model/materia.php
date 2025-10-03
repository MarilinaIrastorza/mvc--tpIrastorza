<?php require_once ("controller/DBController.php");
class Materia {
    public function listar() {
        $db = new DB();
        $conn = $db->connect();

        if (!$conn) {
            die("Error de conexión a la base de datos.");
        }

        $result = $conn->query("SELECT * FROM materias");

        if (!$result) {
            die("Error en la consulta SQL: " . $conn->error);
        }

        $materias = [];
        while ($row = $result->fetch_assoc()) {
            $materias[] = $row;
        }

        return $materias;
    }
}
?>