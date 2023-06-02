<?php
header('Content-Type: application/json; charset=utf-8');
include_once(__DIR__ ."../controllers/sistema.php");
require_once(__DIR__."../controllers/cita.php");
require_once(__DIR__."../controllers/paciente.php");
require_once(__DIR__."../controllers/doctor.php");
require_once(__DIR__."../controllers/consultorio.php");
$action = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? $_GET['id'] : NULL;
switch ($action) {
    case 'DELETE':
        $data['mensaje'] = "No existe el cita.";
        if (!is_null($id)) {
            $contador = $cita->delete($id);
            if ($contador) {
                $data['mensaje'] = "Se eliminó el cita.";
            }
        }
        break;
    case 'POST':
        $data = array();
        $data = $_POST['data'];
        $data['mensaje'] = "Ocurrió un error.";
        if (is_null($id)) {
            $cantidad = $cita->new($data);
            if ($cantidad) {
                $data['mensaje'] = "Se insertó el cita.";
                //$data[''];
            }
        } else {
            $cantidad = $cita->edit($id, $data);
            if ($cantidad) {
                $data['mensaje'] = "Se actualizó el cita.";
                //$data[''];
            }
        }
        break;
    case 'GET':
    default:
        if (is_null($id))
            $data = $cita->get();
        else
            $data = $cita->get($id);
        break;
}
$data = json_encode($data);
echo ($data);
?>