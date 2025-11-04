<h1>Actualizar privilegio</h1>
<form method="POST" action="privilegio.php?action=update&id=<?php echo $data['id_privilegio']; ?>">
    <div class="mb-3">
        <label for="privilegio" class="form-label">Nombre del privilegio</label>
        <input type="text" class="form-control" id="privilegio" name="privilegio" value="<?php echo $data['privilegio']; ?>" placeholder="Nombre del privilegio" required>
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Guardar">
    </div>
</form>
