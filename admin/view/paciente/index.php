<h1 class="text-center">Pacientes</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <p><a class="btn btn-success" href="paciente.php?action=new" role="button">Registrar paciente</a>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-responsive table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Curp</th>
                        <th scope="col">RFC</th>
                        <th scope="col">Nacimiento</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Codigo Postal</th>
                        <th scope="col">Genero</th>
                        <th scope="col">Tratamiento</th>
                        <th scope="col">Consultorio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nReg = 0;
                    foreach ($data as $key => $paciente):
                        $nReg++; ?>
                        <tr>
                            <td>
                                <?php echo $paciente["id_paciente"] ?>
                            </td>
                            <td>
                                <?php echo $paciente["nombre"] ?>
                            </td>
                            <td>
                                <?php echo $paciente["curp"] ?>
                            </td>
                            <td>
                                <?php echo $paciente["rfc"] ?>
                            </td>
                            <td>
                                <?php echo $paciente["nacimiento"] ?>
                            </td>
                            <td>
                                <?php echo $paciente["telefono"] ?>
                            </td>
                            <td>
                                <?php echo $paciente["direccion"] ?>
                            </td>
                            <td>
                                <?php echo $paciente["codigo_postal"] ?>
                            </td>
                            <td>
                                <?php echo $paciente["genero"] ?>
                            </td>
                            <td>
                                <?php echo $paciente["tratamiento"] ?>
                            </td>
                            <td>
                                <?php echo $paciente["consultorio"] ?>
                            </td>

                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="paciente.php?action=edit&id=<?php echo $paciente["id_paciente"] ?>"
                                        type="button" class="btn btn-warning">Modificar</a>
                                    <a href="paciente.php?action=delete&id=<?php echo $paciente["id_paciente"] ?>"
                                        type="button" class="btn btn-danger">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    <tr>
                        <th>
                            Se encontraron
                            <?php echo $nReg ?> registros.
                        </th>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>