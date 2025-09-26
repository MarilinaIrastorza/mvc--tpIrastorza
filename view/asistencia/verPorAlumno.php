<h2>Asistencia del Alumno</h2>

<?php if(isset($data["asistencias"]) && is_array($data["asistencias"])): ?>
    <table border="1">
        <tr><th>Fecha</th><th>Presente</th></tr>
        <?php foreach($data["asistencias"] as $asistencia): ?>
            <tr>
                <td><?= $asistencia["fecha"] ?></td>
                <td><?= $asistencia["presente"] ? 'Sí' : 'No' ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>No hay registros de asistencia para mostrar.</p>
<?php endif; ?>