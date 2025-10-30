<form action="login.php?action=reestablecer" method="post">

    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input name="contrasena" type="password" class="form-control" id="inputPassword">
            <input name="token" type="hidden" class="form-control" id="inputToken" value="<?php echo $_GET['token']; ?>">
            <input name="correo" type="hidden" class="form-control" id="inputCorreo" value="<?php echo $_GET['correo']; ?>">
        </div>

        

        <div class="mb-3">
            <input type="submit" class="btn btn-primary" id="enviar" name="enviar" value="Cambiar">
        </div>
    </div>

</form>