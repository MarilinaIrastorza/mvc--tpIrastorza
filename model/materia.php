<?php
class Materia {
    public static function listar() {
        $db = DB::connect();
        $result = $db->query("SELECT * FROM materias");

        if (!$result) {
            die("Error en la consulta SQL: " . $db->error);
        }

        $materias = [];
        while($row = $result->fetch_assoc()) {
            $materias[] = $row;
        }
        return $materias;
    }
  
    public static function listarPorCurso($cursoId) {
    $db = DB::connect();
    $stmt = $db->prepare("SELECT * FROM materias WHERE curso_id = ?");
    $stmt->bind_param("i", $cursoId);
    $stmt->execute();
    $result = $stmt->get_result();

    $materias = [];
    while($row = $result->fetch_assoc()) {
        $materias[] = $row;
    }
    return $materias;
}
}
?>