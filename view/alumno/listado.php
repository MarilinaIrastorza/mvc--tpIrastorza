<h2>Listado de Alumnos</h2>
<table border="1">
    <tr><th>Nombre</th><th>Curso</th></tr>
    <?php foreach($data["alumnos"] as $alumno): ?>
        <tr>
            <td><?= $alumno["nombre"] ?></td>
            <td><?= $alumno["curso"] ?></td>
        </tr>
    <?php endforeach; ?>
</table>