<h2>Listado de Materias</h2>

<?php if(isset($data["materias"]) && is_array($data["materias"])): ?>
    <table border="1">
        <tr><th>Nombre</th><th>Docente</th></tr>
        <?php foreach($data["materias"] as $materia): ?>
            <tr>
                <td><?= $materia["nombre"] ?></td>
                <td><?= $materia["docente"] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>No hay materias para mostrar.</p>
<?php endif; ?>

