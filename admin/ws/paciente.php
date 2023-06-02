<?php
header('Content-Type: application/json; charset=utf-8');
include_once("/wamp64/www/clinica/admin/controllers/paciente.php");

$action = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? $_GET['id'] : NULL;
switch ($action) {
    case 'DELETE':
        $data['mensaje'] = "No existe el paciente";
        if (!is_null($id)) {
            $contador = $paciente->delete($id);
            if ($contador) {
                $data['mensaje'] = "Se eliminó el paciente.";
            }
        }
        break;
    case 'POST':
        $data = array();
        $data = $_POST['data'];
        $data['mensaje'] = "Ocurrió un error.";
        if (is_null($id)) {
            $cantidad = $paciente->new($data);
            if ($cantidad) {
                $data['mensaje'] = "Se insertó el paciente.";
                //$data[''];
            }
        } else {
            $cantidad = $paciente->edit($id, $data);
            if ($cantidad) {
                $data['mensaje'] = "Se actualizó el paciente.";
                //$data[''];
            }
        }
        break;
    case 'GET':
    default:
        if (is_null($id))
            $data = $paciente->get();
        else
            $data = $paciente->get($id);
        break;
}
$data = json_encode($data);
echo ($data);
?>