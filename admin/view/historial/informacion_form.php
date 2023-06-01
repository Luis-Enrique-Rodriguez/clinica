<h1>
    <?php echo ($action == 'edit') ? 'Modificar' : 'Nuevo'; ?> Registro Medico
</h1>

<form class="container-fluid" method="POST" action="historial.php?action=<?php echo ($action); ?>"
    enctype="multipart/form-data">

    <input type="hidden" name="data[id]" value=" <?php echo $id ?>">

<br>
    <div class="row">
        <div class="col-2">
            <label for="nombre">Titulo</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="titulo" name="data[titulo]"
                value="<?php echo isset($data[0]['titulo']) ? $data[0]['titulo'] : ''; ?>" minlength="3"
                maxlength="200">
        </div>
    </div>   
<br>
<div class="row">
        <div class="col-2">
            <label for="nombre">Descripcion</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="descripcion" name="data[descripcion]"
                value="<?php echo isset($data[0]['descripcion']) ? $data[0]['descripcion'] : ''; ?>" minlength="3"
                maxlength="200">
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
        <div class="col-5">
            <label for="id_historial">No. de historial</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_historial]" required="required">
                <?php
                $selected = " ";
                foreach ($dataHistorial as $key => $historial):
                    if ($paciente['id_historial'] == $data[0]['id_historial']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $paciente['id_historial']; ?>" <?php echo $selected; ?>>
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
        <!-- <input type="hidden" name="data[id_historial]" -->
            <!-- value="<?php //echo isset($data[0]['id_historial']) ? $data[0]['id_historial'] : ''; ?>" class="" /> -->
    <? //endif; ?>
</form>