<?php
require_once(__DIR__."/controllers/historial.php");
require_once(__DIR__."/controllers/paciente.php");
require_once(__DIR__."/controllers/doctor.php");

include("view/img.php");
$id_informacion = (isset($_GET['id_informacion'])) ? $_GET['id_informacion'] : null;

$action = (isset($_GET["action"])) ? $_GET["action"] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch ($action){
    case 'new':
        $dataHistorial = $historial->get(null);
        $dataPaciente = $paciente->get(null);
        $dataDoctor = $doctor->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data']['id'];
            $cantidad = $historial->new($data);
            if ($cantidad) {
         //       $historial->flash('success', 'Registro dado de alta con éxito');
                $data = $historial->get(null);
                include('view/historial/index.php');
            } else {
                //$proyecto->flash('danger', 'Algo fallo');
                include('view/historial/form.php');
            }
        } else {
            include('view/historial/form.php');
        }
        break;

    case 'edit':
        $dataHistorial = $historial->get(null);
        $dataPaciente = $paciente->get(null);
        $dataDoctor = $doctor->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id'];
            $cantidad = $historial->edit($id, $data);
            if ($cantidad) {
                //$historial->flash('success', 'Registro actualizado con éxito');
                $data = $historial->get(null);
                include('view/historial/index.php');
            } else {
                //$historial->flash('danger', 'Algo fallo');
                $data = $historial->get(null);
                include('view/historial/index.php');
            }
        } else {
            $data = $historial->get($id);
            include('view/historial/form.php');
        }
        break;

    case 'delete':
        $cantidad = $historial->delete($id);
        if ($cantidad) {
                //$historial->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $historial->get(null);
            include('view/historial/index.php');
        } else {
            //$historial->flash('danger', 'Algo fallo');
            $data = $historial->get(null);
            include('view/historial/index.php');
        }
        break;

// Informacion Historial //
        case 'task':
            //$proyecto->validatePrivilegio('Proyecto Leer');
            $data = $historial->get($id);
            $data_historial = $historial->getTask($id);
            include('view/historial/informacion.php');
            break;

        case 'deletetask':
            $proyecto->validatePrivilegio('Proyecto Eliminar');
            
            $cantidad = $proyecto->deleteTask($id_tarea);
            if ($cantidad) {
                $proyecto->flash('success', 'Registro con el id= ' . $id_tarea . ' eliminado con éxito');
                $data = $proyecto->get($id);
                $data_historial = $proyecto->getTask($id);
                include('views/proyecto/tarea.php');
            } else {
                $proyecto->flash('danger', 'Algo fallo');
                $data = $proyecto->get($id);
                $data_historial = $proyecto->getTask($id);
                include('views/proyecto/tarea.php');
            }
            break;
    case 'newtask':
        //$proyecto->validatePrivilegio('Proyecto Crear');
            $dataPaciente = $paciente->get(null);

        $data = $historial->get($id);
        if (isset($_POST['enviar'])) {
            $data2 = $_POST['data'];
            $cantidad = $historial->newTask($id, $data2);
            if ($cantidad) {
                //$historial->flash('success', 'Registro dado de alta con éxito');
    
            } else {
                //$historial->flash('danger', 'Algo fallo');
            }
            $data_historial = $historial->getTask($id);
            include('view/historial/informacion.php');
            } else {
                include('view/historial/informacion_form.php');
            }
            //$data_historial = $proyecto->getTask($id);
            break;

    case 'edittask':
        //$proyecto->validatePrivilegio('Proyecto Actualizar');
        $dataHistorial = $historial->get(null);
        $data = $historial->get($id);
        if (isset($_POST['enviar'])) {
            $data2 = $_POST['data'];
            $id_historial = $_POST['data']['id_historial'];
            $cantidad = $historial->editTask($id, $id_historial, $data2);
            if ($cantidad) {
                //$historial->flash('success', 'Registro dado de alta con éxito');
            } else {
                //$historial->flash('danger', 'Algo fallo');
            }
            $data_historial = $historial->getTask($id);
            include('views/historial/informacion.php');
            } else {
                $data_historial = $historial->getTaskOne($id_historial);
                include('views/historial/informacion_form.php');
            }
            break;

    case 'getAll':
        default:
        $data = $historial ->get(null);
        include("view/historial/index.php");
}
?>