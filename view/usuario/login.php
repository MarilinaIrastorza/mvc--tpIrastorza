<h2>Iniciar sesión</h2>

<form method="post" action="index.php?controller=usuario&action=validarLogin">
    <label for="usuario">Usuario:</label>
    <input type="text" name="usuario" id="usuario" required><br><br>

    <label for="clave">Contraseña:</label>
    <input type="password" name="clave" id="clave" required><br><br>

    <button type="submit">Ingresar</button>
</form>