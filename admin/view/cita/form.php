<h1>
    <?php echo ($action == 'edit') ? 'Modificar' : 'Nuevo'; ?> Cita
</h1>

<form class="container-fluid" method="POST" action="cita.php?action=<?php echo ($action); ?>"
    enctype="multipart/form-data">

    <input type="hidden" name="data[id]" value=" <?php echo $id ?>">

<br>
    <div class="row">
        <div class="col-2">
            <label for="cita">Cita:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="cita" name="data[cita]"
                value="<?php echo isset($data[0]['cita']) ? $data[0]['cita'] : ''; ?>" minlength="3"
                maxlength="200">
        </div>
    </div>   
<br>
    <div class="row">
        <div class="col-2">
            <label for="descripcion">Descripcion</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="descripcion" name="data[descripcion]"
                value="<?php echo isset($data[0]['descripcion']) ? $data[0]['descripcion'] : ''; ?>">
        </div>
    </div>
<br>
   
<div class="row">
        <div class="col-2">
            <label for="fecha">Fecha</label>
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
        <div class="col-5">
            <label for="id_doctor">Nombre del doctor</label>
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
            <label for="id_consultorio">Consultorio:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_consultorio]" required="required">
                <?php
                $selected = " ";
                foreach ($dataConsultorio as $key => $consultorio):
                    if ($consultorio['id_consultorio'] == $data[0]['id_consultorio']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $consultorio['id_consultorio']; ?>" <?php echo $selected; ?>>
                        <?php echo $consultorio['consultorio'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div> 

<br>
   
<div class="row">
        <div class="col-5">
            <label for="id_paciente">Nombre del paciente</label>
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
        <div class="col-12">
            <input type="submit" class="btn btn-primary mb-3" name="enviar" value="Guardar">
        </div>
    </div>

    <?
    //if ($action == 'edit'): ?>
        <!-- <input type="hidden" name="data[id_doctor]" -->
            <!-- value=" <?php //echo isset($data[0]['id_doctor']) ? $data[0]['id_doctor'] : ''; ?>" class="" /> -->
    <?// endif; ?>
</form>