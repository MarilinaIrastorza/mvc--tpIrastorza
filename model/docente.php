<?php
class Docente {
    public static function listar() {
        $db = DB::connect();
        $result = $db->query("SELECT * FROM docentes");

        if (!$result) {
            die("Error en la consulta SQL: " . $db->error);
        }

        $docentes = [];
        while($row = $result->fetch_assoc()) {
            $docentes[] = $row;
        }
        return $docentes;
    }

    public static function buscarPorId($id) {
        $db = DB::connect();
        $stmt = $db->prepare("SELECT * FROM docentes WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
