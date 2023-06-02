<?php
require_once("controllers/sistema.php");
require_once("../vendor/autoload.php");
use Spipu\Html2Pdf\Html2Pdf;
$html2pdf = new Html2Pdf();
$action = (isset($_GET['action'])) ? $_GET['action'] : 'get';
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
$sistema->db();
switch($action):
    case 'cita':
        $sql = "SELECT * from cita where id_cita = :id_cita";
        $st = $sistema->db->prepare($sql);
        $st->bindParam(":id_cita", $id, PDO::PARAM_INT);
        $st->execute();
        $data = $st->fetchAll(PDO::FETCH_ASSOC);
        $html = '
        <img src="../images/logo.png"/>
        ';
        $html .= "<p style='color:red'>" . $data[0]['cita'] . "</p>";
        $html .= " 
        <table>
            <tr>
                <td>id_cita</td>
                <td>cita</td>
                <td>descripcion</td>
                <td>fecha</td>
                <td>id_doctor</td>
                <td>id_consultorio</td>
                <td>id_paciente</td>
            </tr>";
        foreach($data as $key => $cita):
            $html .= "
            <tr>
                <th>".$cita['id_cita']."</th>
                <td>".$cita['cita']."</td>
                <td>".$cita['descripcion']."</td>
                <td>".$cita['fecha']."</td>
                <td>".$cita['id_doctor']."</td>
                <td>".$cita['id_consultorio']."</td>
                <td>".$cita['id_paciente']."</td>
            </tr> ";
        endforeach;
        $html .= "
        </table>
        ";
        break;
    default:
        $html='<h1>Sin cita</h1>No hay ningún reporte a generar';
endswitch;
$html2pdf->writeHTML($html);
$html2pdf->output();
?>