<?php
require_once 'config/config.php';
require_once 'model/db.php';
require_once 'controller/DBController.php';
require_once 'model/Student.php';
require_once 'model/Attendance.php';
require_once 'model/alumno.php';


// Lógica del controlador dinámico
if (!isset($_GET["controller"])) $_GET["controller"] = constant("DEFAULT_CONTROLLER");
if (!isset($_GET["action"])) $_GET["action"] = constant("DEFAULT_ACTION");

$controller_path = 'controller/' . $_GET["controller"] . 'Controller.php';

if (!file_exists($controller_path)) {
    die("Error: El controlador '" . $_GET["controller"] . "' no fue encontrado.");
}

require_once $controller_path;
$controllerName = $_GET["controller"] . 'Controller';

if (!class_exists($controllerName)) {
    die("Error: La clase del controlador '" . $controllerName . "' no está definida.");
}

$controller = new $controllerName();
$dataToView["data"] = array();
$action = $_GET["action"];

if (method_exists($controller, $action)) {
    $dataToView["data"] = $controller->$action();
} else {
    die("Error: La acción '" . $action . "' no está definida en el controlador '" . $controllerName . "'.");
}



// Cargar vistas (ahora que $controller está definido)
require_once 'view/template/header.php';
if (!empty($controller->view) && file_exists('view/' . $controller->view . '.php')) {
    require_once 'view/' . $controller->view . '.php';
} else {
    echo "<p>Vista no encontrada: " . htmlspecialchars($controller->view) . "</p>";
}

$data = $dataToView["data"];

// Acciones específicas (legacy switch)
$db_handle = new DBController();

if (!empty($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "peru";
}

switch ($action) {
    case "attendance-add":
        if (isset($_POST['add'])) {
            $attendance = new Attendance();
            $attendance_date = date("Y-m-d", strtotime($_POST["attendance_date"]));

            if (!empty($_POST["student_id"])) {
                $attendance->deleteAttendanceByDate($attendance_date);
                foreach ($_POST["student_id"] as $student_id) {
                    $present = ($_POST["attendance-$student_id"] == "present") ? 1 : 0;
                    $absent = ($_POST["attendance-$student_id"] == "absent") ? 1 : 0;
                    $attendance->addAttendance($attendance_date, $student_id, $present, $absent);
                }
            }
            header("Location: index.php?action=attendance");
        }
        $student = new Student();
        $studentResult = $student->getAllStudent();
        require_once "mainfile/attendance-add.php";
        break;

    case "attendance-edit":
        $attendance_date = $_GET["date"];
        $attendance = new Attendance();
        if (isset($_POST['add'])) {
            $attendance->deleteAttendanceByDate($attendance_date);
            if (!empty($_POST["student_id"])) {
                foreach ($_POST["student_id"] as $student_id) {
                    $present = ($_POST["attendance-$student_id"] == "present") ? 1 : 0;
                    $absent = ($_POST["attendance-$student_id"] == "absent") ? 1 : 0;
                    $attendance->addAttendance($attendance_date, $student_id, $present, $absent);
                }
            }
            header("Location: index.php?action=attendance");
        }
        $result = $attendance->getAttendanceByDate($attendance_date);
        $student = new Student();
        $studentResult = $student->getAllStudent();
        require_once "mainfile/attendance-edit.php";
        break;

    case "attendance-delete":
        $attendance_date = $_GET["date"];
        $attendance = new Attendance();
        $attendance->deleteAttendanceByDate($attendance_date);
        $result = $attendance->getAttendance();
        require_once "mainfile/attendance.php";
        break;

    case "attendance":
        $attendance = new Attendance();
        $result = $attendance->getAttendance();
        require_once "mainfile/attendance.php";
        break;

    case "student-add":
        if (isset($_POST['add'])) {
            $name = $_POST['name'];
            $roll_number = $_POST['roll_number'];
            $dob = (!empty($_POST["dob"])) ? date("Y-m-d", strtotime($_POST["dob"])) : "";
            $class = $_POST['class'];

            $student = new Student();
            $insertId = $student->addStudent($name, $roll_number, $dob, $class);
            if (empty($insertId)) {
                $response = array("message" => "Problema al agregar un nuevo registro", "type" => "error");
            } else {
                header("Location: index.php");
            }
        }
        require_once "mainfile/student-add.php";
        break;

    case "student-edit":
        $student_id = $_GET["id"];
        $student = new Student();
        if (isset($_POST['add'])) {
            $name = $_POST['name'];
            $roll_number = $_POST['roll_number'];
            $dob = (!empty($_POST["dob"])) ? date("Y-m-d", strtotime($_POST["dob"])) : "";
            $class = $_POST['class'];
            $student->editStudent($name, $roll_number, $dob, $class, $student_id);
            header("Location: index.php");
        }
        $result = $student->getStudentById($student_id);
        require_once "mainfile/student-edit.php";
        break;

    case "student-delete":
        $student_id = $_GET["id"];
        $student = new Student();
        $student->deleteStudent($student_id);
        $result = $student->getAllStudent();
        require_once "mainfile/student.php";
        break;

    default:
        $student = new Student();
        $result = $student->getAllStudent();
        require_once "mainfile/student.php";
        break;
}
require_once 'view/template/footer.php';
?>