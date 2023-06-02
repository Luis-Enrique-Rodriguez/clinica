<?php
include('controllers/sistema.php');
include_once("view/img.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "login";



switch($action){
    case 'logout':
        $sistema->logout();
        //include_once('view/login/index.php');
        break;
    
    case 'forgot':
        include_once('view/login/forgot.php');
        break;

    case 'send':
        if (isset($_POST['enviar'])) {
            $correo = $_POST['correo'];
            $send = $sistema->loginSend($correo);
            if ($send) {
                 $sistema->alerta('success', "Si el correo existe y está en la base de datos se le enviará un correo para la recuperación");
            } else {
                 $sistema->alerta('danger', "Error");
            }
            include_once('view/login/index.php');
        }
        break;

    case 'recovery':
        $data =$_GET;
        if(isset($data['correo']) and isset($data['token'])){
            if($sistema->validateToken($data['correo'],$data['token'])){
                include_once('view/login/recovery.php');
            }else{
                 $sistema->alerta('danger', "El token expiro");
                include_once('view/login/index.php');
            }
        }else{
             $sistema->alerta('danger', "Url no puede ser completada como la requirio");
            include_once('view/login/index.php');
        }
        break;

    case 'reset':
        $data =$_POST;
        if(isset($data['correo']) and isset($data['token']) and isset($data['contrasena'])){
            if($sistema->validateToken($data['correo'],$data['token'])){
                if($sistema->resetPassword($data['correo'],$data['token'],$data['contrasena'])){
                     $sistema->alerta('success', "Contraseña restablecida con exito");
                    include_once('view/login/index.php');
                }else{
                     $sistema->alerta('warning', "Contacta a soporte tecnico");
                    include_once('view/login/forgot.php');
                }
            }else{
                $sistema->alerta('danger', "El token expiro");
                include_once('view/login/index.php');
            }
        }else{
            $sistema->alerta('danger', "Url no puede ser completada como la requirio");
            include_once('view/login/index.php');
        }
        break;

    case 'login':
        default:
        if(isset($_POST['enviar'])){
            $data = $_POST;
            $login = $sistema->login($data['correo'], $data['contrasena']);
            if($login){
                header("Location: view/menu.php");
                

            }else{
                include_once('view/login/index.php');
                
            }
        }
        include_once('view/login/index.php');
        break;
}



?>