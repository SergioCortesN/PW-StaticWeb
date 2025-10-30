<h1>Modificar investigador</h1>
<form method="POST" action="investigador.php?action=update&id=<?php echo $id; ?>" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="primer_apellido" class="form-label">Primer apellido</label>
        <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" value="<?php echo $data['primer_apellido']; ?>" placeholder="Primer apellido" required>
        
        <label for="segundo_apellido" class="form-label">Segundo apellido</label>
        <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" value="<?php echo $data['segundo_apellido']; ?>" placeholder="Segundo apellido">
        
        <label for="investigador" class="form-label">Nombre del investigador</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $data['nombre']; ?>" placeholder="Nombre" required>

    <label for="correo" class="form-label">Correo electrónico</label>
    <input type="email" class="form-control" id="correo" name="correo" value="<?php echo isset($data['correo']) ? $data['correo'] : ''; ?>" placeholder="correo@ejemplo.com" required>

    <label for="contrasena" class="form-label">Contraseña (dejar en blanco para no cambiar)</label>
    <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña (opcional)">

        <label for="fotografia" class="form-label">Fotografía</label>
        <img src="/web/web_v2/images/investigadores/<?php echo $data['fotografia']; ?>" alt="" style="width: 100px; height: auto;">
        <input type="file" class="form-control" id="fotografia" name="fotografia" placeholder="foto.png">
        <input type="hidden" name="fotografia_actual" value="<?php echo $data['fotografia']; ?>">
        
        <label for="id_institucion" class="form-label">Institución</label>
        <select class="form-select" id="id_institucion" name="id_institucion" required>
            <?php foreach ($instituciones as $institucion): 
                $selected = '';
                if($data['id_institucion'] == $institucion['id_institucion']){
                    $selected = 'selected';
                   }   
            ?>
                <option <?php echo $selected; ?> value="<?php echo $institucion['id_institucion']; ?>"><?php echo $institucion['institucion']; ?></option>
            <?php endforeach; ?>
        </select>
        
    <label for="semblanza" class="form-label">Semblanza</label>
    <input type="text" class="form-control" id="semblanza" name="semblanza" value="<?php echo $data['semblanza']; ?>" placeholder="Semblanza">
        
        <label for="id_tratamiento" class="form-label">Tratamiento</label>
        <select class="form-select" id="id_tratamiento" name="id_tratamiento" required>
            <?php foreach ($tratamientos as $tratamiento):
                $selected = '';
                if($data['id_tratamiento'] == $tratamiento['id_tratamiento']){
                    $selected = 'selected';
                   }   
            ?>
                <option <?php echo $selected; ?> value="<?php echo $tratamiento['id_tratamiento']; ?>"><?php echo $tratamiento['tratamiento']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Guardar">
    </div>
</form>