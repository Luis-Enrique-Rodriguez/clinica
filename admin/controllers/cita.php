<?php
require_once(__DIR__ . "/sistema.php");

class Cita extends Sistema
{
    //Mostrar todos los registros
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "
            select c.id_cita, c.cita, c.descripcion, c.fecha, cto.consultorio, p.nombre as paciente, d.nombre
            from cita c
                     join paciente p on c.id_paciente = p.id_paciente
                     join doctor d on d.id_doctor = c.id_doctor
                     join consultorio cto on c.id_consultorio = cto.id_consultorio;";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from cita where id_cita=:id";
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
            $sql = "INSERT INTO cita (cita, descripcion, fecha, id_doctor, id_consultorio, id_paciente) 
            VALUES (:cita, :descripcion, :fecha, :id_doctor, :id_consultorio, :id_paciente)";
            // print_r($data['id_doctor']);
            //var_dump($data);
            //exit(1);
            $st = $this->db->prepare($sql);
            $st->bindParam(":cita", $data['cita'], PDO::PARAM_STR);
            $st->bindParam(":descripcion", $data['descripcion'], PDO::PARAM_STR);
            $st->bindParam(":fecha", $data['fecha'], PDO::PARAM_STR);
            $st->bindParam(":id_doctor", $data['id_doctor'], PDO::PARAM_INT);
            $st->bindParam(":id_consultorio", $data['id_consultorio'], PDO::PARAM_INT);
            $st->bindParam(":id_paciente", $data['id_paciente'], PDO::PARAM_INT);
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
        $sql = "UPDATE cita SET cita =:cita, descripcion=:descripcion, id_doctor=:id_doctor, id_consultorio=:id_consultorio, id_paciente=:id_paciente, fecha = :fecha 
        where id_cita= :id";
        //print_r($id);
        //var_dump($data);
        //exit();
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $data['id'], PDO::PARAM_INT);
        $st->bindParam(":cita", $data['cita'], PDO::PARAM_STR);
        $st->bindParam(":descripcion", $data['descripcion'], PDO::PARAM_STR);
        $st->bindParam(":fecha", $data['fecha'], PDO::PARAM_STR);
        $st->bindParam(":id_doctor", $data['id_doctor'], PDO::PARAM_INT);
        $st->bindParam(":id_consultorio", $data['id_consultorio'], PDO::PARAM_INT);
        $st->bindParam(":id_paciente", $data['id_paciente'], PDO::PARAM_INT);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    //Eliminar registro
    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM cita WHERE id_cita=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
$cita = new Cita;
?>