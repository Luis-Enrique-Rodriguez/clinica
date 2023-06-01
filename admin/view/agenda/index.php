<h1 class="text-center">Agenda</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <p><a class="btn btn-success" href="agenda.php?action=new" role="button">Registrar</a>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-responsive table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Consultorio</th>
                        <th scope="col">Nombre del paciente</th>
                        <th scope="col">Nombre del doctor</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $nReg = 0;
                    foreach ($data as $key => $agenda):
                        $nReg++; ?>
                        <tr>
                            <td>
                                <?php echo $agenda["id_cita"] ?>
                            </td>
                            <td>
                                <?php echo $agenda["consultorio"] ?>
                            </td>
                            <td>
                                <?php echo $agenda["paciente"] ?>
                            </td>
                            <td>
                                <?php echo $agenda["nombre"] ?>
                            </td>
                            
                            
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="agenda.php?action=edit&id=<?php echo $agenda["id_cita"] ?>"
                                        type="button" class="btn btn-warning">Modificar</a>
                                    <a href="agenda.php?action=delete&id=<?php echo $agenda["id_cita"] ?>"
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