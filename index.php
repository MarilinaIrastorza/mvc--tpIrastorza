<?php
session_start();

$modulo = $_GET['modulo'] ?? '';
$action = $_GET['action'] ?? '';
include_once ("./mainfile/template/header.php");
switch ($modulo) {
    case 'Student':
        require_once("clases/Student.php");
        $student = new Student();

        if (isset($_POST['add'])) {
            $name = $_POST['name'];
            $roll_number = $_POST['roll_number'];
            $dob = $_POST['dob'] ? date("Y-m-d", strtotime($_POST['dob'])) : "";
            $class = $_POST['class'];

            $insertId = $student->addStudent($name, $roll_number, $dob, $class);
            if ($insertId) {
                header("Location: index.php?modulo=Student&action=listado");
                exit;
            } else {
                echo "<p>Error al agregar alumno.</p>";
            }
        }

        switch ($action) {
            case 'listado':
                $alumnos = $student->getAllStudent();
                echo "<h2>Listado de Alumnos</h2>";
                echo "<table border='1' cellpadding='5'>
                        <tr><th>ID</th><th>Nombre</th><th>Rol</th><th>Fecha</th><th>Clase</th></tr>";
                foreach ($alumnos as $alumno) {
                    echo "<tr>
                            <td>{$alumno['id']}</td>
                            <td>{$alumno['nombres']}</td>
                            <td>{$alumno['rol_numero']}</td>
                            <td>{$alumno['fecha_estudiante']}</td>
                            <td>{$alumno['clase']}</td>
                          </tr>";
                }
                echo "</table>";
                break;

            case 'add':
                echo "<h2>Agregar Alumno</h2>";
                echo "<form method='post' action='index.php?modulo=Student&action=add'>
                        <label>Nombre:</label><br>
                        <input type='text' name='name' required><br><br>

                        <label>Rol:</label><br>
                        <input type='number' name='roll_number' required><br><br>

                        <label>Fecha de nacimiento:</label><br>
                        <input type='date' name='dob'><br><br>

                        <label>Clase:</label><br>
                        <input type='text' name='class'><br><br>

                        <input type='submit' name='add' value='Agregar Alumno'>
                      </form>";
                break;

            case 'edit':
                require_once "mainfile/student-edit.php";
                break;

            case 'delete':
                require_once "mainfile/student-delete.php";
                break;

            default:
                require_once "mainfile/student.php";
                break;
        }
        break;

    case 'Docente':
        require_once("clases/Docente.php");
        $docente = new Docente();

        if ($action === 'listado') {
            $docentes = $docente->getAllDocente();
            echo "<h2>Listado de Docentes</h2>";
            echo "<table border='1' cellpadding='5'>
                    <tr><th>ID</th><th>Nombre</th><th>Especialidad</th><th>Email</th></tr>";
            foreach ($docentes as $d) {
                echo "<tr>
                        <td>{$d['id']}</td>
                        <td>{$d['nombre']}</td>
                        <td>{$d['especialidad']}</td>
                        <td>{$d['email']}</td>
                      </tr>";
            }
            echo "</table>";
        }
        break;

    case 'Curso':
        require_once("clases/Cursos.php");
        $curso = new Curso();

        if ($action === 'listado') {
            $cursos = $curso->getAllCurso();
            echo "<h2>Listado de Cursos</h2>";
            echo "<table border='1' cellpadding='5'>
                    <tr><th>ID</th><th>Nombre</th><th>Nivel</th><th>Turno</th></tr>";
            foreach ($cursos as $d) {
                echo "<tr>
                        <td>{$d['id']}</td>
                        <td>{$d['nombre']}</td>
                        <td>{$d['nivel']}</td>
                        <td>{$d['turno']}</td>
                      </tr>";
            }
            echo "</table>";
        }
        break;

    case 'Attendance':
        require_once("clases/Attendance.php");
        require_once("clases/Student.php");
        $attendance = new Attendance();

        if (isset($_POST['add'])) {
            $attendance_date = date("Y-m-d", strtotime($_POST["attendance_date"]));
            if (!empty($_POST["student_id"])) {
                $attendance->deleteAttendanceByDate($attendance_date);
                foreach ($_POST["student_id"] as $student_id) {
                    $present = ($_POST["attendance-$student_id"] === "present") ? 1 : 0;
                    $absent = ($_POST["attendance-$student_id"] === "absent") ? 1 : 0;
                    $attendance->addAttendance($attendance_date, $student_id, $present, $absent);
                }
            }
            header("Location: index.php?modulo=Attendance&action=view");
            exit;
        }

        switch ($action) {
            case 'add':
                $student = new Student();
                $studentResult = $student->getAllStudent();
                echo "<h2>Tomar Asistencia</h2>";
                echo "<form method='post' action='index.php?modulo=Attendance&action=add'>
                        <label>Fecha:</label><br>
                        <input type='date' name='attendance_date' required><br><br>
                        <table border='1' cellpadding='5'>
                            <tr><th>Alumno</th><th>Presente</th><th>Ausente</th></tr>";
                foreach ($studentResult as $alumno) {
                    echo "<tr>
                            <td>{$alumno['nombres']}
                                <input type='hidden' name='student_id[]' value='{$alumno['id']}'>
                            </td>
                            <td><input type='radio' name='attendance-{$alumno['id']}' value='present' required></td>
                            <td><input type='radio' name='attendance-{$alumno['id']}' value='absent'></td>
                          </tr>";
                }
                echo "</table><br>
                      <input type='submit' name='add' value='Guardar Asistencia'>
                      </form>";
                break;

            case 'edit':
                $attendance_date = $_GET["date"];
                $result = $attendance->getAttendanceByDate($attendance_date);
                $student = new Student();
                $studentResult = $student->getAllStudent();
                require_once "mainfile/attendance-edit.php";
                break;

            case 'delete':
                $attendance_date = $_GET["date"];
                $attendance->deleteAttendanceByDate($attendance_date);
                $result = $attendance->getAttendance();
                require_once "mainfile/attendance.php";
                break;

            case 'view':
            default:
                $result = $attendance->getAttendance();
                require_once "mainfile/attendance.php";
                break;
        }
        break;

    default:
        echo "  <p>Bienvenido al sistema!</p>
                <p>Seleccioná una opción del menú para comenzar.</p>";
        break;
}
include_once("./mainfile/template/footer.php");
?>