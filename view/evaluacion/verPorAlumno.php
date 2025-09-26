<h2>Evaluaciones del Alumno</h2>
<table border="1">
    <tr><th>Materia</th><th>Nota</th><th>Fecha</th></tr>
    <?php foreach($data["evaluaciones"] as $eval): ?>
        <tr>
            <td><?= $eval["materia"] ?></td>
            <td><?= $eval["nota"] ?></td>
            <td><?= $eval["fecha"] ?></td>
        </tr>
    <?php endforeach; ?>
</table>