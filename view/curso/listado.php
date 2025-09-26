<h2>Listado de Cursos</h2>

<?php if(isset($data["cursos"]) && is_array($data["cursos"])): ?>
    <table border="1">
        <tr><th>Nombre</th><th>Nivel</th><th>Turno</th></tr>
        <?php foreach($data["cursos"] as $curso): ?>
            <tr>
                <td><?= $curso["nombre"] ?></td>
                <td><?= $curso["nivel"] ?></td>
                <td><?= $curso["turno"] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>No hay cursos para mostrar.</p>
<?php endif; ?>