<h1>
    <?php echo ($action == 'edit') ? 'Modificar' : 'Nuevo'; ?> Paciente
</h1>
<form class="container-fluid" method="POST" action="paciente.php?action=<?php echo ($action); ?>"
    enctype="multipart/form-data">
    <input type="hidden" name="data[id]" id="id_paciente" value=" <?php echo $id ?>">

    <div class="row">
        <div class="col-2">
            <label for="nombre">Nombre:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="nombre" name="data[nombre]"
                value="<?php echo isset($data[0]['nombre']) ? $data[0]['nombre'] : ''; ?>" minlength="3"
                maxlength="200">
        </div>
    </div>

<br>
    <div class="row">
        <div class="col-2">
            <label for="curp">Curp</label>
        </div>
    </div>
    <div class="row">

        <div class="col-2">
            <input required="required" type="text" class="" id="curp" name="data[curp]"
                value="<?php echo isset($data[0]['curp']) ? $data[0]['curp'] : ''; ?>">
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-2">
            <label for="rfc">RFC</label>
        </div>
    </div>
    <div class="row">

        <div class="col-2">
            <input required="required" type="text" class="" id="rfc" name="data[rfc]"
                value="<?php echo isset($data[0]['rfc']) ? $data[0]['rfc'] : ''; ?>">
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-2">
            <label for="nacimiento">Fecha de nacimiento:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="date" class="" id="nacimiento" name="data[nacimiento]"
                value="<?php echo isset($data[0]['nacimiento']) ? $data[0]['nacimiento'] : ''; ?>">
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-2">
            <label for="telefono">Telefono</label>
        </div>
    </div>
    <div class="row">

        <div class="col-2">
            <input required="required" type="text" class="" id="telefono" name="data[telefono]"
                value="<?php echo isset($data[0]['telefono']) ? $data[0]['telefono'] : ''; ?>">
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-2">
            <label for="direccion">Direccion</label>
        </div>
    </div>
    <div class="row">

        <div class="col-2">
            <input required="required" type="text" class="" id="direccion" name="data[direccion]"
                value="<?php echo isset($data[0]['direccion']) ? $data[0]['direccion'] : ''; ?>">
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-2">
            <label for="codigo_postal">Codigo Postal</label>
        </div>
    </div>
    <div class="row">

        <div class="col-2">
            <input required="required" type="text" class="" id="codigo_postal" name="data[codigo_postal]"
                value="<?php echo isset($data[0]['codigo_postal']) ? $data[0]['codigo_postal'] : ''; ?>">
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-2">
            <label for="id_genero">Genero:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_genero]" required="required">
                <?php
                $selected = " ";
                foreach ($dataGenero as $key => $genero):
                    if ($genero['id_genero'] == $data[0]['id_genero']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $genero['id_genero']; ?>" <?php echo $selected; ?>>
                        <?php echo $genero['genero'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-2">
            <label for="id_tratamiento">Tratamiento:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_tratamiento]" required="required">
                <?php
                $selected = " ";
                foreach ($dataTratamiento as $key => $tratamiento):
                    if ($tratamiento['id_tratamiento'] == $data[0]['id_tratamiento']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $tratamiento['id_tratamiento']; ?>" <?php echo $selected; ?>>
                        <?php echo $tratamiento['tratamiento'] ?></option>
                        
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
        <div class="col-12">
            <input type="submit" class="btn btn-primary mb-3" name="enviar" value="Guardar">
        </div>
    </div>

    <?
   // if ($action == 'edit'): ?>
        <!-- <input type="hidden" name="data[id_paciente]" -->
            <!-- value="<?php //echo isset($data[0]['id_paciente']) ? $data[0]['id_paciente'] : ''; ?>" class="" /> -->
    <? //endif; ?>
</form>