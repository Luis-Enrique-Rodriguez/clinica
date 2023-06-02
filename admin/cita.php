<?php
require_once(__DIR__."/controllers/cita.php");
require_once(__DIR__."/controllers/paciente.php");
require_once(__DIR__."/controllers/doctor.php");
require_once(__DIR__."/controllers/consultorio.php");
include("view/img.php");

$action = (isset($_GET["action"])) ? $_GET["action"] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch ($action){
    case 'new':
        $dataCita = $cita->get(null);
        $dataDoctor = $doctor->get(null);
        $dataConsultorio = $consultorio->get(null);
        $dataPaciente = $paciente->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $cita->new($data);
            if ($cantidad) {
                $cita->alerta('success', 'Registro dado de alta con éxito');
                $data = $cita->get(null);
                include('view/cita/index.php');
            } else {
                $cita->alerta('danger', 'Algo fallo');
                include('view/cita/form.php');
            }
        } else {
            include('view/cita/form.php');
        }
        break;

    case 'edit':
        $dataCita = $cita->get(null);
        $dataDoctor = $doctor->get(null);
        $dataConsultorio = $consultorio->get(null);
        $dataPaciente = $paciente->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id'];
            $cantidad = $cita->edit($id, $data);
            if ($cantidad) {
                $cita->alerta('success', 'Registro actualizado con éxito');
                $data = $cita->get(null);
                include('view/cita/index.php');
            } else {
                $cita->alerta('danger', 'Algo fallo');
                $data = $cita->get(null);
                include('view/cita/index.php');
            }
        } else {
            $data = $cita->get($id);
            include('view/cita/form.php');
        }
        break;

    case 'delete':
        $cantidad = $cita->delete($id);
        if ($cantidad) {
                $cita->alerta('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $cita->get(null);
            include('view/cita/index.php');
        } else {
            $cita->alerta('danger', 'Algo fallo');
            $data = $cita->get(null);
            include('view/cita/index.php');
        }
        break;

    case 'getAll':
        default:
        $data = $cita ->get(null);
        include("view/cita/index.php");
}
?>