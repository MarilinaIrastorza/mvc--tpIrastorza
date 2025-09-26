<?php
class Asistencia {
    public static function listarPorAlumno($idAlumno) {
        $db = DB::connect();
        $stmt = $db->prepare("SELECT * FROM asistencias WHERE alumno_id = ?");

        if (!$stmt) {
            die("Error al preparar la consulta SQL: " . $db->error);
        }

        $stmt->bind_param("i", $idAlumno);
        $stmt->execute();
        $result = $stmt->get_result();

        $asistencias = [];
        while($row = $result->fetch_assoc()) {
            $asistencias[] = $row;
        }
        return $asistencias;
    }
}
?>