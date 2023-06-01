<h1 class="text-center">Informacion Historial Medico:
    Paciente No: 
    <?php echo $data[0]['id_paciente']; ?>
</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <p><a class="btn btn-success" href="historial.php?action=newtask&id=<?php echo $data[0]['id_historial']; ?>"
                    role="button">Nuevo registro</a>
            </p>
        </div>
    </div>
    <table class="table table-responsive table-bordered">
        <thead>
            <tr>
                <th scope="col" class="col-md-2">No. Registro</th>
                <th scope="col" class="col-md-2">Titulo</th>
                <th scope="col" class="col-md-6">Descripcion</th>
                <th scope="col" class="col-md-3">Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php $nReg = 0;
            foreach ($data_historial as $key => $informacion):
                $nReg++; ?>
                <tr>
                    <td scope="row">
                        <?php echo $informacion["id_informacion"] ?>
                    </td>
                    <td scope="row">
                        <?php echo $informacion["titulo"] ?>
                    </td>
                    <td scope="row">
                        <?php echo $informacion["descripcion"] ?>
                    </td>
                    <td scope="row">
                        <?php echo $informacion["fecha"] ?>
                    </td>
                    
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="historial.php?action=edittask&id=<?php echo $data[0]["id_historial"]; ?>&id_informacion=<?php echo $informacion["id_informacion"]; ?>"
                                type="button" class="btn btn-primary">Editar</a>
                            <a href="historial.php?action=deletetask&id=<?php echo $data[0]["id_historial"]; ?>&id_informacion=<?php echo $informacion["id_informacion"]; ?>"
                                type="button" class="btn btn-danger">Eliminar</a>
                        </div>
                    </td>
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