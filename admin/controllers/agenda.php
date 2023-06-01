<?php
require_once(__DIR__ . "/sistema.php");

class Agenda extends Sistema
{
    //Mostrar todos los registros
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select c.id_cita, cto.consultorio, p.nombre as paciente, d.nombre
            from agenda a
                     join cita c on c.id_cita = a.id_cita
                     join consultorio cto on a.id_consultorio = cto.id_consultorio
                     join paciente p on c.id_paciente = p.id_paciente
                     join doctor d on d.id_doctor = c.id_doctor";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from agenda where id_cita=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }
    //Crear un nuevo registro
    public function new($data)
    {
        $this->db();
        try{
            $this->db->beginTransaction();
            $sql = "INSERT INTO historial_medico (id_paciente, id_doctor, fecha ) 
            VALUES (:id_paciente,:id_doctor,:fecha)";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id_paciente", $data['id_paciente'], PDO::PARAM_INT);
            $st->bindParam(":id_doctor", $data['id_doctor'], PDO::PARAM_INT);
            $st->bindParam(":fecha", $data['fecha'], PDO::PARAM_STR);
            $st->execute();
            $rc = $st->rowCount();
            $this->db->commit();
        }catch(PDOException $Exception){
            $rc = 0;
            print "DBA FAIL:" . $Exception->getMessage();

            $this->db->rollBack();
        }
        
        return $rc;
    }

    //Editar un registro
    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE historial_medico SET id_paciente =: id_paciente, id_doctor=:id_doctor, fecha = :fecha where id_historial= :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":id_paciente", $data['id_paciente'], PDO::PARAM_INT);
        $st->bindParam(":id_doctor", $data['id_doctor'], PDO::PARAM_INT);
        $st->bindParam(":fecha", $data['fecha'], PDO::PARAM_STR);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    //Eliminar registro
    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM historial_medico WHERE id_historial=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
$agenda = new Agenda;
?>