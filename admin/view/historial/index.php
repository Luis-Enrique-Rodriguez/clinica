<h1 class="text-center">Historiales Medicos</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <p><a class="btn btn-success" href="historial.php?action=new" role="button">Registrar</a>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-responsive table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre del Paciente</th>
                        <th scope="col">Nombre del Doctor</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nReg = 0;
                    foreach ($data as $key => $historial):
                        $nReg++; ?>
                        <tr>
                            <td>
                                <?php echo $historial["id_historial"] ?>
                            </td>
                            <td>
                                <?php echo $historial["paciente"] ?>
                            </td>
                            <td>
                                <?php echo $historial["nombre"] ?>
                            </td>
                            <td>
                                <?php echo $historial["fecha"] ?>
                            </td>
                            
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="historial.php?action=task&id=<?php echo $historial["id_historial"] ?>"
                                        type="button" class="btn btn-primary">Información</a>
                                    <a href="historial.php?action=edit&id=<?php echo $historial["id_historial"] ?>"
                                        type="button" class="btn btn-warning">Modificar</a>
                                    <a href="historial.php?action=delete&id=<?php echo $historial["id_historial"] ?>"
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