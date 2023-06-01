<h1>
    <?php echo ($action == 'edit') ? 'Modificar' : 'Nuevo'; ?> Doctor
</h1>

<form class="container-fluid" method="POST" action="doctor.php?action=<?php echo ($action); ?>"
    enctype="multipart/form-data">

    <input type="hidden" name="data[id]" value=" <?php echo $id ?>">


<br>
    <div class="row">
        <div class="col-2">
            <label for="foto">Foto</label>
        </div>
    </div>
    <div class="row">

        <div class="col-5">
        <?php if ($action == 'edit'): ?>
        <div class="alert alert-primary" role="alert">
        <a href="<?php echo $data[0]['foto']?>" target="_blank">Descargar</a>
        </div>
        <?php endif;?>
            <input type="file" name="foto" class="form-control"
                value='<?php echo isset($data[0]['foto']) ? $data[0]['foto'] : ''; ?>' />
        </div>
    </div>


<br>
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
            <label for="cedula_profesional">Cedula Profesional</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="cedula_profesional" name="data[cedula_profesional]"
                value="<?php echo isset($data[0]['cedula_profesional']) ? $data[0]['cedula_profesional'] : ''; ?>">
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
            <label for="id_genero">Genero:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_genero]" required="required">
                <?php
                $selected = " ";
                foreach ($dataGenero as $key => $gen):
                    if ($gen['id_genero'] == $data[0]['id_genero']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $gen['id_genero']; ?>" <?php echo $selected; ?>>
                        <?php echo $gen['genero'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-2">
            <label for="id_usuario">Usuario</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_usuario]" required="required">
                <?php
                $selected = " ";
                foreach ($dataUsuario as $key => $usuario):
                    if ($usuario['id_usuario'] == $data[0]['id_usuario']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $usuario['id_usuario']; ?>" <?php echo $selected; ?>>
                        <?php echo $usuario['correo'] ?></option>
                        
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div> 
<br>
<div class="row">
    <div class="col-2">
            <label for="id_especialidad">Especialidad:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_especialidad]" required="required">
                <?php
                $selected = " ";
                foreach ($dataEspecialidad as $key => $especialidad):
                    if ($especialidad['id_especialidad'] == $data[0]['id_especialidad']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $especialidad['id_especialidad']; ?>" <?php echo $selected; ?>>
                        <?php echo $especialidad['especialidad'] ?></option>
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
    //if ($action == 'edit'): ?>
    <!-- <input type="hidden" name="data[id_doctor]" -->
            <!-- value="<?php //echo isset($data[0]['id_doctor']) ? $data[0]['id_doctor'] : ''; ?>" class="" /> -->
    <? //endif; ?>
</form>