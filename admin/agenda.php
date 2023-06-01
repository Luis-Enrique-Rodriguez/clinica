<?php
require_once(__DIR__."/controllers/cita.php");
require_once(__DIR__."/controllers/paciente.php");
require_once(__DIR__."/controllers/doctor.php");
require_once(__DIR__."/controllers/consultorio.php");
require_once(__DIR__."/controllers/agenda.php");
include("view/img.php");

$action = (isset($_GET["action"])) ? $_GET["action"] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch ($action){
    case 'new':
        $dataCita = $cita->get(null);
        $dataPaciente = $paciente->get(null);
        $dataDoctor = $doctor->get(null);
        $dataConsultorio = $consultorio->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $agenda->new($data);
            if ($cantidad) {
         //       $historial->flash('success', 'Registro dado de alta con éxito');
                $data = $agenda->get(null);
                include('view/agenda/index.php');
            } else {
                //$proyecto->flash('danger', 'Algo fallo');
                include('view/agenda/form.php');
            }
        } else {
            include('view/agenda/form.php');
        }
        break;

    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_historial'];
            $cantidad = $agenda->edit($id, $data);
            if ($cantidad) {
                //$agenda->flash('success', 'Registro actualizado con éxito');
                $data = $agenda->get(null);
                include('view/agenda/index.php');
            } else {
                //$agenda->flash('danger', 'Algo fallo');
                $data = $agenda->get(null);
                include('view/agenda/index.php');
            }
        } else {
            $data = $agenda->get($id);
            include('view/agenda/form.php');
        }
        break;

    case 'delete':
        $cantidad = $agenda->delete($id);
        if ($cantidad) {
                //$agenda->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $agenda->get(null);
            include('view/agenda/index.php');
        } else {
            //$agenda->flash('danger', 'Algo fallo');
            $data = $agenda->get(null);
            include('view/agenda/index.php');
        }
        break;

    case 'getAll':
        default:
        $data = $agenda ->get(null);
        include("view/agenda/index.php");
}
?>