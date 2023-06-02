<?php
header('Content-Type: application/json; charset=utf-8');
include_once("/wamp64/www/clinica/admin/controllers/usuario.php");

$action = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? $_GET['id'] : NULL;
switch ($action) {
    case 'DELETE':
        $data['mensaje'] = "No existe el usuario";
        if (!is_null($id)) {
            $contador = $usuario->delete($id);
            if ($contador) {
                $data['mensaje'] = "Se eliminó el usuario.";
            }
        }
        break;
    case 'POST':
        $data = array();
        $data = $_POST['data'];
        $data['mensaje'] = "Ocurrió un error.";
        if (is_null($id)) {
            $cantidad = $usuario->new($data);
            if ($cantidad) {
                $data['mensaje'] = "Se insertó el usuario.";
                //$data[''];
            }
        } else {
            $cantidad = $usuario->edit($id, $data);
            if ($cantidad) {
                $data['mensaje'] = "Se actualizó el usuario.";
                //$data[''];
            }
        }
        break;
    case 'GET':
    default:
        if (is_null($id))
            $data = $usuario->get();
        else
            $data = $usuario->get($id);
        break;
}
$data = json_encode($data);
echo ($data);
?>