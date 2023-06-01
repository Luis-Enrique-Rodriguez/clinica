<h1 class="text-center">Citas</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <p><a class="btn btn-success" href="cita.php?action=new" role="button">Registrar</a>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-responsive table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cita</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Nombre del doctor</th>
                        <th scope="col">Consultorio</th>
                        <th scope="col">Nombre del paciente</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nReg = 0;
                    foreach ($data as $key => $cita):
                        $nReg++; ?>
                        <tr>
                            <td>
                                <?php echo $cita["id_cita"] ?>
                            </td>
                            <td>
                                <?php echo $cita["cita"] ?>
                            </td>
                            <td>
                                <?php echo $cita["descripcion"] ?>
                            </td>
                            <td>
                                <?php echo $cita["fecha"] ?>
                            </td>
                            <td>
                                <?php echo $cita["nombre"] ?>
                            </td>
                            <td>
                                <?php echo $cita["consultorio"] ?>
                            </td>
                            <td>
                                <?php echo $cita["paciente"] ?>
                            </td>
                            
                            
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="cita.php?action=edit&id=<?php echo $cita["id_cita"] ?>"
                                        type="button" class="btn btn-warning">Modificar</a>
                                    <a href="cita.php?action=delete&id=<?php echo $cita["id_cita"] ?>"
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