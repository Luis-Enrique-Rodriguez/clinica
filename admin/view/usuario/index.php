<h1 class="text-center">Usuario</h1>
<a href="contacto.php?action=new" class="btn btn-success">Nuevo</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Usuario</th>
            <th scope="col">Contraseña</th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $usuario):
            $nReg++; ?>
            <tr>
                <th scope="row">
                    <?php echo $usuario["id_usuario"] ?>
                </th>
                <th scope="row">
                    <?php echo $usuario["correo"] ?>  
                </th>
                <th scope="row">
                    <?php echo $usuario["contrasena"] ?>
                </th>
                
                <th>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="contacto.php?action=edit&id=<?php echo $usuario["id_usuario"] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="contacto.php?action=delete&id=<?php echo $usuario["id_usuario"] ?>"
                            type="button" class="btn btn-danger">Eliminar</a>
                    </div>
                </th>
            </tr>
        <?php endforeach; ?>
        <tr>
            <th>
                Se encontraron
                <?php echo $nReg ?> registros.
            </th>
        </tr>
    </tbody>
</table>