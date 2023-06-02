<?php
require_once(__DIR__."/controllers/doctor.php");
require_once(__DIR__."/controllers/genero.php");
require_once(__DIR__."/controllers/especialidad.php");
require_once(__DIR__."/controllers/consultorio.php");
require_once(__DIR__."/controllers/contacto.php");
include("view/img.php");

$action = (isset($_GET["action"])) ? $_GET["action"] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch ($action){
    case 'new':
        $dataDoctor = $doctor->get(null);
        $dataGenero = $genero->get(null);
        $dataEspecialidad = $especialidad->get(null);
        $dataConsultorio = $consultorio->get(null);
        $dataUsuario = $usuario->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $doctor->new($data);
            if ($cantidad) {
          $doctor->alerta('success', 'Registro dado de alta con éxito');
                $data = $doctor->get(null);
                include('view/doctor/index.php');
            } else {
                $doctor->alerta('danger', 'Algo fallo');
                include('view/doctor/form.php');
            }
        } else {
            include('view/doctor/form.php');
        }
        break;
        
    case 'edit':
        $dataDoctor = $doctor->get(null);
        $dataGenero = $genero->get(null);
        $dataEspecialidad = $especialidad->get(null);
        $dataConsultorio = $consultorio->get(null);
        $dataUsuario = $usuario->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id'];
            $cantidad = $doctor->edit($id, $data);
            if ($cantidad) {
        $doctor->alerta('success', 'Registro actualizado con éxito');
                $data = $doctor->get(null);
                include('view/doctor/index.php');
            } else {
        $doctor->alerta('danger', 'Algo fallo');
                $data = $doctor->get(null);
                include('view/doctor/index.php');
            }
        } else {
            $data = $doctor->get($id);
            include('view/doctor/form.php');
        }
        break;
    
    case 'delete':
        $cantidad = $doctor->delete($id);
        if ($cantidad) {
    $doctor->alerta('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $doctor->get(null);
            include('view/doctor/index.php');
        } else {
    $doctor->alerta('danger', 'Algo fallo');
            $data = $doctor->get(null);
            include('view/doctor/index.php');
        }
        break;
    
    case 'getAll':
        default:
        $data = $doctor ->get(null);
        include("view/doctor/index.php");
}
?>