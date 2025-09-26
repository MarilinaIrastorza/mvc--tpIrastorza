<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión Escolar</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        header { background-color: #2c3e50; color: white; padding: 10px 20px; }
        nav { margin-top: 10px; }
        nav a {
            color: #f1c40f;
            margin-right: 15px;
            text-decoration: none;
            font-weight: bold;
        }
        nav a:hover {
            color: #ecf0f1;
        }
        .container { padding: 20px; }
        .bienvenida { float: right; font-size: 0.9em; color: #bdc3c7; }
    </style>
</head>
<body>
    <header>
        <h1>Panel de Gestión Escolar</h1>
        <div class="bienvenida">
            <?php if(isset($_SESSION["usuario"])): ?>
                Bienvenido, <?= $_SESSION["usuario"]["nombre"] ?> (<?= $_SESSION["usuario"]["rol"] ?>)
            <?php endif; ?>
        </div>
        <nav>
            <a href="index.php?controller=alumno&action=listado">Alumnos</a>
            <a href="index.php?controller=docente&action=listado">Docentes</a>
            <a href="index.php?controller=curso&action=listado">Cursos</a>
            <a href="index.php?controller=materia&action=listado">Materias</a>
            <a href="index.php?controller=evaluacion&action=verPorAlumno&id=1">Evaluaciones</a>
            <a href="index.php?controller=asistencia&action=verPorAlumno&id=1">Asistencia</a>
            <?php if(isset($_SESSION["usuario"])): ?>
                <a href="index.php?controller=usuario&action=logout">Cerrar sesión</a>
            <?php else: ?>
                <a href="index.php?controller=usuario&action=login">Login</a>
            <?php endif; ?>
        </nav>
    </header>
    <div class="container">
           
           

