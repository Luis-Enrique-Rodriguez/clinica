<?php
require_once(__DIR__."/controllers/paciente.php");
require_once(__DIR__."/controllers/genero.php");
require_once(__DIR__."/controllers/tratamiento.php");
require_once(__DIR__."/controllers/consultorio.php");
include("view/img.php");

$action = (isset($_GET["action"])) ? $_GET["action"] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;


switch ($action){
    case 'new':
        $dataGenero = $genero->get(null);
        $dataTratamiento = $tratamiento->get(null);
        $dataConsultorio = $consultorio->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $paciente->new($data);
            if ($cantidad) {
         //       $paciente->flash('success', 'Registro dado de alta con éxito');
                $data = $paciente->get(null);
                include('view/paciente/index.php');
            } else {
                
                //$proyecto->flash('danger', 'Algo fallo');
                include('view/paciente/form.php');
            }
        } else {
            include('view/paciente/form.php');
        }
        break;

    case 'edit':
        $dataGenero = $genero->get(null);
        $dataTratamiento = $tratamiento->get(null);
        $dataConsultorio = $consultorio->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id'];
            $cantidad = $paciente->edit($id, $data);
            if ($cantidad) {
                //$paciente->flash('success', 'Registro actualizado con éxito');
                $data = $paciente->get(null);
                include('view/paciente/index.php');
            } else {
                //$paciente->flash('danger', 'Algo fallo');
                $data = $paciente->get(null);
                include('view/paciente/index.php');
            }
        } else {
            $data = $paciente->get($id);
            include('view/paciente/form.php');
        }
        break;

    case 'delete':
        $cantidad = $paciente->delete($id);
        if ($cantidad) {
            //$paciente->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $paciente->get(null);
            include('view/paciente/index.php');
        } else {
            //$paciente->flash('danger', 'Algo fallo');
            $data = $paciente->get(null);
            include('view/paciente/index.php');
        }
        break;
        
    case 'getAll':
        default:
        $data = $paciente ->get(null);
        include("view/paciente/index.php");
}
?>