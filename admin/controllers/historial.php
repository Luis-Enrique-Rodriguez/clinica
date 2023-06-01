<?php
require_once(__DIR__ . "/sistema.php");

class Historial extends Sistema
{
    //Mostrar todos los registros
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select h.id_historial,
            p.nombre as paciente,
            d.nombre,
            h.fecha
from paciente p
     join historial_medico h on h.id_paciente = p.id_paciente
     join doctor d on h.id_doctor = d.id_doctor;";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from historial_medico where id_historial=:id";
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
        $sql = "UPDATE historial_medico SET id_paciente =: id_paciente, id_doctor=:id_doctor, fecha =:fecha 
        where id_historial= :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $data['id'], PDO::PARAM_INT);
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

    public function getTask($id = null){
        $this->db();
        if (is_null($id)) {
            $sql = "select * from informacion_historial";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * informacion_historial";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function deleteTask($id)
    {
        $this->db();
        $sql = "DELETE FROM tarea WHERE id_tarea=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function newTask($id, $data)
    {
        $this->db();
        $sql = "INSERT INTO tarea (id_proyecto, tarea, avance) VALUES (:id_proyecto, :tarea, :avance)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_proyecto", $id, PDO::PARAM_INT);
        $st->bindParam(":tarea", $data['tarea'], PDO::PARAM_STR);
        $st->bindParam(":avance", $data['avance'], PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function getTaskOne($id)
    {
        $data = null;
        $this->db();
        if (is_null($id)) {
            die("Ocurrio un error :c");
        } else {
            $sql = "select * from tarea t left join proyecto p 
            on p.id_proyecto = t.id_proyecto where t.id_tarea=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }


        return $data;
    }

    public function editTask($id, $id_tarea, $data)
    {
        $this->db();
        $sql = "UPDATE tarea SET tarea = :tarea,
         avance=:avance where id_tarea= :id_tarea 
         AND id_proyecto=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":id_tarea", $id_tarea, PDO::PARAM_INT);
        $st->bindParam(":tarea", $data['tarea'], PDO::PARAM_STR);
        $st->bindParam(":avance", $data['avance'], PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

}
$historial = new Historial;
?>