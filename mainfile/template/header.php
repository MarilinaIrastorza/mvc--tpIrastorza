<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <title>Gestión Escolar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #2c3e50;
            color: white;
            padding: 10px 20px;
        }

        nav {
            margin-top: 10px;
        }

        nav a {
            color: #f1c40f;
            margin-right: 15px;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            color: #ecf0f1;
        }

        .container {
            padding: 20px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Panel de Gestión Escolar</h1>
        <nav>
            <a href='index.php?modulo=Student&action=listado'>Alumnos</a>
            <a href='index.php?modulo=Student&action=add'>Agregar Alumno</a>
            <a href='index.php?modulo=Attendance&action=add'>Tomar Asistencia</a>
            <a href='index.php?modulo=Docente&action=listado'>Docentes</a>
            <a href='index.php?modulo=Curso&action=listado'>Cursos</a>

        </nav>
    </header>
    <div class='container'>