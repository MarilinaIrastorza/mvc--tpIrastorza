<?php
define("DEFAULT_CONTROLLER", "alumno");
define("DEFAULT_ACTION", "listado");

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "php_crud");

class DB {
    public static function connect() {
        return new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }
}
?>