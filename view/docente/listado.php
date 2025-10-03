<h2>Listado de Docentes</h2>
<table border="1">
    <tr><th>Nombre</th><th>Especialidad</th></tr>
    <?php if (!empty($data["docentes"]) && is_array($data["docentes"])): ?>
        <?php foreach($data["docentes"] as $docente): ?>
            <tr>
                <td><?= htmlspecialchars($docente["nombre"]) ?></td>
                <td><?= htmlspecialchars($docente["especialidad"]) ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="2">No hay docentes para mostrar.</td></tr>
    <?php endif; ?>
</table>