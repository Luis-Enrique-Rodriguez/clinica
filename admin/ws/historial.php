<?php
header('Content-Type: application/json; charset=utf-8');
include_once("/wamp64/www/clinica/admin/controllers/historial.php");

$action = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? $_GET['id'] : NULL;
switch ($action) {
    case 'DELETE':
        $data['mensaje'] = "No existe el historial";
        if (!is_null($id)) {
            $contador = $historial->delete($id);
            if ($contador) {
                $data['mensaje'] = "Se eliminó el historial.";
            }
        }
        break;
    case 'POST':
        $data = array();
        $data = $_POST['data'];
        $data['mensaje'] = "Ocurrió un error.";
        if (is_null($id)) {
            $cantidad = $historial->new($data);
            if ($cantidad) {
                $data['mensaje'] = "Se insertó el historial.";
                //$data[''];
            }
        } else {
            $cantidad = $historial->edit($id, $data);
            if ($cantidad) {
                $data['mensaje'] = "Se actualizó el historial.";
                //$data[''];
            }
        }
        break;
    case 'GET':
    default:
        if (is_null($id))
            $data = $historial->get();
        else
            $data = $historial->get($id);
        break;
}
$data = json_encode($data);
echo ($data);
?>