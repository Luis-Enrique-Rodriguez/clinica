<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once(__DIR__.'/../conexion.php');

class Sistema{
    var $db = null;
    // Conexión a la base de datos
    public function db(){
        $dsn = DBDRIVER . ':host=' . DBHOST . ';dbname=' . DBNAME . ';port=' . DBPORT;
        $this->db = new PDO($dsn, DBUSER, DBPASS);
    }
    // Metodo para validar correo y contraseña
    public function login($correo, $contrasena){
        if (!is_null($contrasena)) {
            if (strlen($contrasena) > 0) {
                if ($this->validateEmail($correo)) {
                    $contrasena = md5($contrasena);
                    $this->db();
                    $sql = "SELECT id_usuario, correo FROM usuario where correo=:correo AND contrasena=:contrasena";
                    $st = $this->db->prepare($sql);
                    $st->bindParam(":correo", $correo, PDO::PARAM_STR);
                    $st->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);
                    $st->execute();
                    $data = $st->fetchAll(PDO::FETCH_ASSOC);
                    if (isset($data[0])) {
                        $data = $data[0];
                        $_SESSION = $data;
//                        $_SESSION['roles'] = $this->getRoles($correo);
//                        $_SESSION['privilegios'] = $this->getPrivilegios($correo);
                        $_SESSION['validado'] = true;
                        return true;
                    }
                }
            }
        }
        return false;
    }

    public function validateEmail($correo){
        if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public function logout(){
        unset($_SESSION['logeado']);
        session_destroy();
        header("Location: index.php");
        exit();
    }

    public function forgot($destinatario, $token){
        if ($this->validateEmail($destinatario)) {
            require '../vendor/autoload.php';
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPAuth = true;
            $mail->Username = '18032429@itcelaya.edu.mx';
            $mail->Password = 'fhjiihtkqruzrybf';
            $mail->setFrom('18032429@itcelaya.edu.mx', 'FrissDent');
            $mail->addAddress(utf8_decode($destinatario));
            $mail->Subject = utf8_decode('Recuperación de contraseña');
            $mensaje =  "
            Estimado usuario " . $destinatario . " 
            <br>
            Usted solicito una recuperación de contraseña. Si es correcto de clic en el siguiente enlace, de lo contrario ignore este correo.
            <br>
            <a href=\"http://localhost/clinica/admin/login.php?action=recovery&token=$token&correo=$destinatario\">Presione aqui para recuperar la contraseña.</a> 
            <br>
            Atentamente FrissDent.
        ";
            $mensaje = utf8_decode($mensaje);
            $mail->msgHTML($mensaje);
            if (!$mail->send()) {
                //echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                //echo 'Message sent!';
            }
            function save_mail($mail)
            {
                $path = '{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail';
                $imapStream = imap_open($path, $mail->Username, $mail->Password);
                $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
                imap_close($imapStream);

                return $result;
            }
        }
    }

    public function generarToken($correo){
        $token = "papaschicas";
        $n = rand(1, 100000);
        $x = md5(md5($token));
        $y = md5($x . $n);
        $token = md5($y);
        $token = md5($token . 'calamardo');
        $token = md5('patricio') . md5($token . $correo);
        return $token;
    }

    public function loginSend($correo){
        $data2 = 0;
        if ($this->validateEmail($correo)) {
            $this->db();
            $sql = "SELECT correo FROM usuario where correo=:correo";
            $st = $this->db->prepare($sql);
            $st->bindParam(':correo', $correo, PDO::PARAM_STR);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
            if (isset($data[0])) {
                $token = $this->generarToken($correo);
                $sql2 = "UPDATE usuario SET token=:token WHERE correo=:correo";
                $st2 = $this->db->prepare($sql2);
                $st2->bindParam(':token', $token, PDO::PARAM_STR);
                $st2->bindParam(':correo', $correo, PDO::PARAM_STR);
                $st2->execute();

                $data2 = $st2->rowCount();
                $this->forgot($correo, $token);
            }
        }
        return $data2;

    }
    
    public function validateToken($correo, $token){
        if(strlen($token)==64){
            if($this->validateEmail($correo)){
                $this->db();
                $sql = "SELECT correo FROM usuario where correo=:correo and token=:token";
                $st = $this->db->prepare($sql);
                $st->bindParam(':correo', $correo, PDO::PARAM_STR);
                $st->bindParam(':token', $token, PDO::PARAM_STR);
                $st->execute();
                $data = $st->fetchAll(PDO::FETCH_ASSOC);
                if(isset($data[0])){
                    return true;
                }
            }
        }
        return false;
    }

    public function resetPassword($correo,$token,$contrasena){
        $cantidad=0;
        if(strlen($token)==64 and strlen($contrasena)>0){
            if($this->validateEmail($correo)){
                $contrasena=md5($contrasena);
                $this->db();
                $sql = "UPDATE usuario set contrasena=:contrasena,token=null 
                        where correo=:correo and token=:token";
                $st = $this->db->prepare($sql);
                $st->bindParam(':correo', $correo, PDO::PARAM_STR);
                $st->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
                $st->bindParam(':token', $token, PDO::PARAM_STR);
                $st->execute();
                $cantidad = $st->rowCount();
            }
        }
        return $cantidad;
    }

    public function alerta($color, $msg)
    {
        include('view/alerta.php');
    }

}

$sistema = new Sistema;
?>

