<?php
header('Content-Type: application/json; charset=utf-8');
include_once("/wamp64/www/clinica/admin/controllers/doctor.php");

$action = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? $_GET['id'] : NULL;
switch ($action) {
    case 'DELETE':
        $data['mensaje'] = "No existe el doctor";
        if (!is_null($id)) {
            $contador = $doctor->delete($id);
            if ($contador) {
                $data['mensaje'] = "Se eliminó el doctor.";
            }
        }
        break;
    case 'POST':
        $data = array();
        $data = $_POST['data'];
        $data['mensaje'] = "Ocurrió un error.";
        if (is_null($id)) {
            $cantidad = $doctor->new($data);
            if ($cantidad) {
                $data['mensaje'] = "Se insertó el doctor.";
                //$data[''];
            }
        } else {
            $cantidad = $doctor->edit($id, $data);
            if ($cantidad) {
                $data['mensaje'] = "Se actualizó el doctor.";
                //$data[''];
            }
        }
        break;
    case 'GET':
        
    default:
        if (is_null($id)) {
            $reemplazo = str_replace("/clinica/admin/ws/doctor/", "", $_SERVER['REQUEST_URI']);
            $reemplazo = str_replace("\n", "", $reemplazo);
            if($_SERVER['REQUEST_URI'] == "/clinica/admin/ws/doctor/") {
                $data = "No has introducido un id valido";
            }
            else if($_SERVER['REQUEST_URI'] == "/clinica/admin/ws/doctor/".$reemplazo){
                $data = $doctor->get(intval($reemplazo));
                if($data == [])
                    $data = "No existe un doctor con el id...";
            }
            else
                $data = $doctor->get();
        }
        else {
            $data = $doctor->get($id);
        }
        break;
}
$data = json_encode($data);
echo ($data);
?>