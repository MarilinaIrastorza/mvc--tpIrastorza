<?php
class Curso {
    public static function listar() {
        $db = DB::connect();
        $result = $db->query("SELECT * FROM cursos");

        if (!$result) {
            die("Error en la consulta SQL: " . $db->error);
        }

        $cursos = [];
        while($row = $result->fetch_assoc()) {
            $cursos[] = $row;
        }
        return $cursos;
    }


    public static function detalle($id) {
        $db = DB::connect();
        $stmt = $db->prepare("SELECT * FROM cursos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>