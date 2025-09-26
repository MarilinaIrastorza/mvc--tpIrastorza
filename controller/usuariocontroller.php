<?php
class usuarioController {
    public $view;

    public function login() {
        $this->view = "usuario/login";
        return [];
    }

    public function validarLogin() {
        $usuario = $_POST["usuario"] ?? '';
        $clave = $_POST["clave"] ?? '';

        // Simulación de validación (podés reemplazar con consulta real)
        if ($usuario === "admin" && $clave === "1234") {
            $_SESSION["usuario"] = [
                "nombre" => "Administrador",
                "rol" => "admin"
            ];
            header("Location: index.php");
            exit;
        } else {
            $this->view = "usuario/login";
            return ["error" => "Usuario o contraseña incorrectos"];
        }
    }
}
?>