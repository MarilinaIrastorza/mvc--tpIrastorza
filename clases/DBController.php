<?php
class DBController {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "php_crud";
    private $conn;

    public function __construct() {
        $this->conn = $this->connectDB();
    }

    public function connectDB() {
        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if (!$conn) {
            die("Error de conexión: " . mysqli_connect_error());
        }
        return $conn;
    }

    public function getConnection() {
        return $this->conn;
    }

    public function runBaseQuery($query) {
        $resultset = array();
        $result = $this->conn->query($query);
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }
        return $resultset;
    }

    public function runQuery($query, $param_type = "", $param_value_array = array()) {
        $resultset = array();
        $sql = $this->conn->prepare($query);
        if ($sql === false) {
            die("Error en prepare: " . $this->conn->error);
        }

        if (!empty($param_type) && !empty($param_value_array)) {
            $this->bindQueryParams($sql, $param_type, $param_value_array);
        }

        $sql->execute();
        $result = $sql->get_result();
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }
        return $resultset;
    }

    private function bindQueryParams($sql, $param_type, $param_value_array) {
        $param_value_reference[] = &$param_type;
        for ($i = 0; $i < count($param_value_array); $i++) {
            $param_value_reference[] = &$param_value_array[$i];
        }
        call_user_func_array(array($sql, 'bind_param'), $param_value_reference);
    }

    public function insert($query, $param_type, $param_value_array) {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
        return $sql->insert_id;
    }

    public function update($query, $param_type, $param_value_array) {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
    }
}
?>
