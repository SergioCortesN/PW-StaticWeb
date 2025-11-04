<h1>Actualizar usuario</h1>
<form method="POST" action="usuarios.php?action=update&id=<?php echo $data['id_usuario']; ?>">
    <div class="mb-3">
        <label for="correo" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $data['correo']; ?>" placeholder="correo@ejemplo.com" required>

        <label for="contrasena" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Dejar en blanco para mantener la actual">
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Guardar">
    </div>
</form>
