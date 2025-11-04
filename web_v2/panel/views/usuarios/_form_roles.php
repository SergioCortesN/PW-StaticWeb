<h1>Gestionar roles del usuario: <?php echo $usuarioData['correo']; ?></h1>

<h3>Roles asignados</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Rol</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php if(!empty($rolesAsignados)): ?>
      <?php foreach ($rolesAsignados as $rol): ?>
      <tr>
        <th scope="row"><?php echo $rol['id_rol']; ?></th>
        <td><?php echo $rol['rol']; ?></td>
        <td>
          <div class="btn-group" role="group" aria-label="Basic mixed styles example">
              <a href="usuarios.php?action=roles&id=<?php echo $usuarioData['id_usuario']; ?>&eliminar_rol=<?php echo $rol['id_rol']; ?>"  class="btn btn-danger">Eliminar</a>
          </div>
        </td>
      </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="3">No tiene roles asignados</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

<h3>Agregar rol</h3>
<form method="POST" action="usuarios.php?action=roles&id=<?php echo $usuarioData['id_usuario']; ?>">
    <div class="mb-3">
        <label for="id_rol" class="form-label">Rol</label>
        <select class="form-select" id="id_rol" name="id_rol" required>
            <option value="">Seleccione un rol</option>
            <?php foreach ($roles as $rol): ?>
                <option value="<?php echo $rol['id_rol']; ?>"><?php echo $rol['rol']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-success" id="agregar_rol" name="agregar_rol" value="Agregar rol">
        <a href="usuarios.php" class="btn btn-secondary">Volver</a>
    </div>
</form>
