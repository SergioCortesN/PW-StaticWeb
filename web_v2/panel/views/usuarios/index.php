<h1>Usuarios</h1>
<div class="btn-group" role="group" aria-label="Basic mixed styles example">
    <a href="usuarios.php?action=create" class="btn btn-success">Nuevo</a>
    <a class="btn btn-primary">Imprimir</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Correo</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($data)): ?>
      <?php foreach ($data as $usuario): ?>
        <tr>
          <th scope="row"><?php echo $usuario['id_usuario']; ?></th>
          <td><?php echo $usuario['correo']; ?></td>
          <td>
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
              <a href="usuarios.php?action=update&id=<?php echo $usuario['id_usuario']; ?>" class="btn btn-warning">Editar</a>
              <a href="usuarios.php?action=roles&id=<?php echo $usuario['id_usuario']; ?>" class="btn btn-info">Roles</a>
              <a href="usuarios.php?action=delete&id=<?php echo $usuario['id_usuario']; ?>" class="btn btn-danger">Eliminar</a>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="3">No hay usuarios registrados</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>
