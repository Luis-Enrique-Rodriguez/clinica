<h1>
    <?php echo ($action == 'edit') ? 'Modificar' : 'Nuevo'; ?> Historial Medico
</h1>

<form class="container-fluid" method="POST" action="historial.php?action=<?php echo ($action); ?>"
    enctype="multipart/form-data">

    <input type="hidden" name="data[id]" value=" <?php echo $id ?>">

<br>
    <div class="row">
        <div class="col-2">
            <label for="nombre">Nombre del paciente</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_paciente]" required="required">
                <?php
                $selected = " ";
                foreach ($dataPaciente as $key => $paciente):
                    if ($paciente['id_paciente'] == $data[0]['id_paciente']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $paciente['id_paciente']; ?>" <?php echo $selected; ?>>
                        <?php echo $paciente['nombre'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-5">
            <label for="nombre">Nombre del doctor</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_doctor]" required="required">
                <?php
                $selected = " ";
                foreach ($dataDoctor as $key => $doctor):
                    if ($doctor['id_doctor'] == $data[0]['id_doctor']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $doctor['id_doctor']; ?>" <?php echo $selected; ?>>
                        <?php echo $doctor['nombre'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-2">
            <label for="fecha">Fecha </label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="date" class="" id="fecha" name="data[fecha]"
                value="<?php echo isset($data[0]['fecha']) ? $data[0]['fecha'] : ''; ?>">
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-12">
            <input type="submit" class="btn btn-primary mb-3" name="enviar" value="Guardar">
        </div>
    </div>

    <?
    if ($action == 'edit'): ?>
        <input type="hidden" name="data[id_historial]"
            value="<?php echo isset($data[0]['id_historial']) ? $data[0]['id_historial'] : ''; ?>" class="" />
    <? endif; ?>
</form>