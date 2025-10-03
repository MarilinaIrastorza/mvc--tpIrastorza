<?php require_once ("controller/DBController.php");
class Docente {
    public  function listar() {
        $db = new DB();
        $conn = $db->connect();

        if (!$conn) {
            die("Error de conexión a la base de datos.");
        }

        $result = $conn->query("SELECT * FROM docentes");

        if (!$result) {
            die("Error en la consulta SQL: " . $conn->error);
        }

        $docentes = [];
        while ($row = $result->fetch_assoc()) {
            $docentes[] = $row;
        }

        return $docentes;
    }
}
?>