<h2>Materias del Curso</h2>
<table border="1">
    <tr><th>Nombre</th><th>Docente</th></tr>
    <?php foreach($data["materias"] as $materia): ?>
        <tr>
            <td><?= $materia["nombre"] ?></td>
            <td><?= $materia["docente"] ?></td>
        </tr>
    <?php endforeach; ?>
</table>