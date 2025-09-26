<?php
class Usuario {
    public static function login($email, $password) {
        $db = DB::connect();
        $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>