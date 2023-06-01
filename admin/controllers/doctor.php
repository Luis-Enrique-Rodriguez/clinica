<?php
require_once(__DIR__ . "/sistema.php");

class Doctor extends Sistema
{
    //Mostrar todos los registros
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select 
            d.id_doctor,
            d.foto, 
            d.nombre,
            d.curp,
            d.rfc,
            d.direccion,
            d.codigo_postal,
            d.cedula_profesional,
            d.telefono,
            g.genero,
            u.correo,
            e.especialidad,
            c.consultorio
     from doctor d
              join genero g on g.id_genero = d.id_genero
              join usuario u on d.id_usuario = u.id_usuario
              join especialidad e on d.id_especialidad = e.id_especialidad
              join consultorio c on d.id_consultorio = c.id_consultorio";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from doctor d left join 
            genero g on g.id_genero = d.id_genero where d.id_doctor=:id";
            //$sql = "select * from doctor where id_doctor=:id";
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
            $sql = "INSERT INTO doctor(foto, nombre, curp, rfc, direccion, codigo_postal, cedula_profesional, telefono, id_genero, id_usuario, id_especialidad, id_consultorio) 
            VALUES (:foto, :nombre, :curp, :rfc, :direccion, :codigo_postal, :cedula_profesional, :telefono, :id_genero, :id_usuario, :id_especialidad, :id_consultorio)";
            $st = $this->db->prepare($sql);
            
            $st->bindParam(":foto", $data['foto'], PDO::PARAM_STR);
            $st->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
            $st->bindParam(":curp", $data['curp'], PDO::PARAM_STR);
            $st->bindParam(":rfc", $data['rfc'], PDO::PARAM_STR);
            $st->bindParam(":direccion", $data['direccion'], PDO::PARAM_STR);
            $st->bindParam(":codigo_postal", $data['codigo_postal'], PDO::PARAM_STR);
            $st->bindParam(":cedula_profesional", $data['cedula_profesional'], PDO::PARAM_STR);
            $st->bindParam(":telefono", $data['telefono'], PDO::PARAM_STR);
            $st->bindParam(":id_genero", $data['id_genero'], PDO::PARAM_INT);
            $st->bindParam(":id_usuario", $data['id_usuario'], PDO::PARAM_INT);
            $st->bindParam(":id_especialidad", $data['id_especialidad'], PDO::PARAM_INT);
            $st->bindParam(":id_consultorio", $data['id_consultorio'], PDO::PARAM_INT);
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
        $sql = "UPDATE doctor SET foto=:foto, nombre=:nombre, curp=:curp, rfc=:rfc, direccion=:direccion, codigo_postal=:codigo_postal, cedula_profesional=:cedula_profesional, telefono=:telefono, id_genero=:id_genero, id_usuario=:id_usuario, id_especialidad=:id_especialidad, id_consultorio=:id_consultorio where id_doctor= :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $data['$id'], PDO::PARAM_INT);
        $st->bindParam(":foto", $data['foto'], PDO::PARAM_STR);
        $st->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
        $st->bindParam(":curp", $data['curp'], PDO::PARAM_STR);
        $st->bindParam(":rfc", $data['rfc'], PDO::PARAM_STR);
        $st->bindParam(":direccion", $data['direccion'], PDO::PARAM_STR);
        $st->bindParam(":codigo_postal", $data['codigo_postal'], PDO::PARAM_STR);
        $st->bindParam(":cedula_profesional", $data['cedula_profesional'], PDO::PARAM_STR);
        $st->bindParam(":telefono", $data['telefono'], PDO::PARAM_STR);
        $st->bindParam(":id_genero", $data['id_genero'], PDO::PARAM_INT);
        $st->bindParam(":id_usuario", $data['id_usuario'], PDO::PARAM_INT);
        $st->bindParam(":id_especialidad", $data['id_especialidad'], PDO::PARAM_INT);
        $st->bindParam(":id_consultorio", $data['id_consultorio'], PDO::PARAM_INT);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    //Eliminar registro
    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM doctor WHERE id_doctor=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
$doctor = new Doctor;
