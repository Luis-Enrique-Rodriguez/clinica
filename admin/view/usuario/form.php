<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> Usuarios </h1>
<form method="POST" action="contacto.php?action=<?php echo $action; ?>">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Usuario</label>
        <input type="text" name="data[correo]" class="form-control" placeholder="Usuario"
            value="<?php echo isset($data[0]['correo']) ? $data[0]['correo'] : ''; ?>" />
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
        <input type="text" name="data[contrasena]" class="form-control" placeholder="Contraseña"
            value="<?php echo isset($data[0]['contrasena']) ? $data[0]['contrasena'] : ''; ?>" />
    </div>
    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_usuario]"
                value="<?php echo isset($data[0]['id_usuario']) ? $data[0]['id_usuario'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>