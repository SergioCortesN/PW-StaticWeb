<h1>Lista de Usuarios</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data)): ?>
            <?php foreach ($data as $usuario): ?>
                <tr>
                    <td><?php echo $usuario['id']; ?></td>
                    <td><?php echo $usuario['nombre']; ?></td>
                    <td><?php echo $usuario['email']; ?></td>
                    <td>
                        <a href="?action=update&id=<?php echo $usuario['id']; ?>">Editar</a>
                        <a href="?action=rol&id=<?php echo $usuario['id']; ?>">Roles</a>
                        <a href="?action=delete&id=<?php echo $usuario['id']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No hay usuarios registrados</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>