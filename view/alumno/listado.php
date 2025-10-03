<h2>Listado de Alumnos</h2>
<table border="1">
    <tr><th>Nombre</th><th>Curso</th></tr>
    <?php if (!empty($data["nombres"]) && is_array($data["nombres"])): ?>
        <?php foreach($data["nombres"] as $tbl_estudiante): ?>
            <tr>
                <td><?= htmlspecialchars($tbl_estudiante["nombre"]) ?></td>
                <td><?= htmlspecialchars($tbl_estudiante["cursos"]) ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="2">No hay alumnos para mostrar.</td></tr>
    <?php endif; ?>
</table>