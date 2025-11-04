<h1>Actualizar rol</h1>
<form method="POST" action="rol.php?action=update&id=<?php echo $data['id_rol']; ?>">
    <div class="mb-3">
        <label for="rol" class="form-label">Nombre del rol</label>
        <input type="text" class="form-control" id="rol" name="rol" value="<?php echo $data['rol']; ?>" placeholder="Nombre del rol" required>
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Guardar">
    </div>
</form>
