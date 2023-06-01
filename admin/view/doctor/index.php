<h1 class="text-center">Doctores</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <p><a class="btn btn-success" href="doctor.php?action=new" role="button">Registrar doctor</a>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-responsive table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Curp</th>
                        <th scope="col">RFC</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Codigo Postal</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Cedula Profesional</th>
                        <th scope="col">Genero</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Especialidad</th>
                        <th scope="col">Consultorio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nReg = 0;
                    foreach ($data as $key => $doctor):
                        $nReg++; ?>
                        <tr>
                            <td>
                                <?php echo $doctor["id_doctor"] ?>
                            </td>
                            <td>
                                <?php echo $doctor["foto"] ?>
                            </td>
                            <td>
                                <?php echo $doctor["nombre"] ?>
                            </td>
                            <td>
                                <?php echo $doctor["curp"] ?>
                            </td>
                            <td>
                                <?php echo $doctor["rfc"] ?>
                            </td>
                            <td>
                                <?php echo $doctor["direccion"] ?>
                            </td>
                            <td>
                                <?php echo $doctor["codigo_postal"] ?>
                            </td>
                            <td>
                                <?php echo $doctor["telefono"] ?>
                            </td>
                            <td>
                                <?php echo $doctor["cedula_profesional"] ?>
                            </td>
                            <td>
                                <?php echo $doctor["genero"] ?>
                            </td>
                            <td>
                                <?php echo $doctor["correo"] ?>
                            </td>
                            <td>
                                <?php echo $doctor["especialidad"] ?>
                            </td>
                            <td>
                                <?php echo $doctor["consultorio"] ?>
                            </td>

                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="doctor.php?action=edit&id=<?php echo $doctor["id_doctor"] ?>"
                                        type="button" class="btn btn-warning">Modificar</a>
                                    <a href="doctor.php?action=delete&id=<?php echo $doctor["id_doctor"] ?>"
                                        type="button" class="btn btn-danger">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    
                    
                </tbody>
            </table>
            Se encontraron
                            <?php echo $nReg ?> registros.
        </div>
    </div>
</div>