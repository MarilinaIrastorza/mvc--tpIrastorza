<h2>Listado de Docentes</h2>
<table border="1">
    <tr><th>Nombre</th><th>Especialidad</th></tr>
    <?php foreach($data["docentes"] as $docente): ?>
        <tr>
            <td><?= $docente["nombre"] ?></td>
            <td><?= $docente["especialidad"] ?></td>
        </tr>
    <?php endforeach; ?>
</table>