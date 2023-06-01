<div class="container">
    <h1>Historial 
        <?php echo $data[0]['id'] ?>
    </h1>
    <a href="historial.php?action=new" class="btn btn-success">Nuevo</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Fecha</th>
                <th scope="col">id_historial</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $informacion) : ?>
                <tr>
                    <th scope="row">
                        <?php echo $informacion['id_informacion']; ?>
                    </th>
                    <td>
                        <?php echo $informacion['titulo']; ?>
                    </td>
                    <td>
                        <?php echo $informacion['descripcion']; ?>
                    </td>
                    <td>
                        <?php echo $informacion['fecha']; ?>
                    </td>
                    <td>
                        <?php echo $informacion['id_historial']; ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Menu Renglon">
                            <a class="btn btn-primary" href="departamento.php?action=edit&id=<?php echo $departamento['id_departamento'] ?>">Ingresar tarea</a>
                            <a class="btn btn-danger" href="departamento.php?action=delete&id=<?php echo $departamento['id_departamento'] ?>">Eliminar tarea</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>