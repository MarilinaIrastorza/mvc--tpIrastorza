<?php
class Alumno {
    public static function listar() {
        $db = DB::connect();
        $result = $db->query("SELECT * FROM alumnos");
        $alumnos = [];
        while($row = $result->fetch_assoc()) {
            $alumnos[] = $row;
        }
        return $alumnos;
    }

    public static function buscarPorId($id) {
        $db = DB::connect();
        $stmt = $db->prepare("SELECT * FROM alumnos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>