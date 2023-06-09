<?php
require_once(__DIR__."/controllers/contacto.php");
include_once("views/img.php");
//include_once("views/menu.php");
//$usuario -> validateRol('Administrador');
$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $usuario->new($data);
            if ($cantidad) {
                $usuario->flash('success', 'Registro dado de alta con éxito');
                $data = $usuario->get(null);
                //include('views/usuario/index.php');
            } else {
                //$usuario->flash('danger', 'Algo fallo');
                include('view/usuario/form.php');
            }
        } else {
            include('view/usuario/form.php');
        }
        break;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_usuario'];
            $cantidad = $usuario->edit($id, $data);
            if ($cantidad) {
                //$usuario->flash('success', 'Registro actualizado con éxito');
                $data = $usuario->get(null);
                include('view/usuario/index.php');
            } else {
                //$usuario->flash('danger', 'Algo fallo');
                $data = $usuario->get(null);
                include('view/usuario/index.php');
            }
        } else {
            $data = $usuario->get($id);
            include('view/usuario/form.php');
        }
        break;
    case 'delete':
        $cantidad = $usuario->delete($id);
        if ($cantidad) {
            //$usuario->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $usuario->get(null);
            include('view/usuario/index.php');
        } else {
           // $usuario->flash('danger', 'Algo fallo');
            $data = $usuario->get(null);
            include('view/usuario/index.php');
        }
        break;
    case 'getAll':
    default:
        $data = $usuario->get(null);
        include("view/usuario/index.php");
}

?>