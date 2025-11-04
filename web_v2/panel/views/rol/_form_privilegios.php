<h1>Gestionar privilegios del rol: <?php echo $rolData['rol']; ?></h1>

<h3>Privilegios asignados</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Privilegio</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php if(!empty($privilegiosAsignados)): ?>
      <?php foreach ($privilegiosAsignados as $privilegio): ?>
      <tr>
        <th scope="row"><?php echo $privilegio['id_privilegio']; ?></th>
        <td><?php echo $privilegio['privilegio']; ?></td>
        <td>
          <div class="btn-group" role="group" aria-label="Basic mixed styles example">
              <a href="rol.php?action=privilegios&id=<?php echo $rolData['id_rol']; ?>&eliminar_privilegio=<?php echo $privilegio['id_privilegio']; ?>"  class="btn btn-danger">Eliminar</a>
          </div>
        </td>
      </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="3">No tiene privilegios asignados</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

<h3>Agregar privilegio</h3>
<form method="POST" action="rol.php?action=privilegios&id=<?php echo $rolData['id_rol']; ?>">
    <div class="mb-3">
        <label for="id_privilegio" class="form-label">Privilegio</label>
        <select class="form-select" id="id_privilegio" name="id_privilegio" required>
            <option value="">Seleccione un privilegio</option>
            <?php foreach ($privilegios as $privilegio): ?>
                <option value="<?php echo $privilegio['id_privilegio']; ?>"><?php echo $privilegio['privilegio']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-success" id="agregar_privilegio" name="agregar_privilegio" value="Agregar privilegio">
        <a href="rol.php" class="btn btn-secondary">Volver</a>
    </div>
</form>
