<?php
require_once(__DIR__ . "/sistema.php");

class Paciente extends Sistema
{
    //Mostrar todos los registros
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select p.nombre,
            p.id_paciente,
            p.curp,
            p.rfc,
            p.nacimiento,
            p.telefono,
            p.direccion,
            p.codigo_postal,
            g.genero,
            t.tratamiento,
            c.consultorio
     from paciente p
              join genero g on g.id_genero = p.id_genero
              join tratamiento t on p.id_tratamiento = t.id_tratamiento
              join consultorio c on p.id_consultorio = c.id_consultorio;";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from paciente where id_paciente=:id";
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
            $sql = "INSERT INTO paciente (nombre, curp,rfc,nacimiento,telefono,direccion,codigo_postal,id_genero,id_tratamiento,id_consultorio) 
            VALUES (:nombre, :curp,:rfc,:nacimiento,:telefono,:direccion,:codigo_postal,:id_genero,:id_tratamiento,:id_consultorio)";
            $st = $this->db->prepare($sql);
            $st->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
            $st->bindParam(":curp", $data['curp'], PDO::PARAM_STR);
            $st->bindParam(":rfc", $data['rfc'], PDO::PARAM_STR);
            $st->bindParam(":nacimiento", $data['nacimiento'], PDO::PARAM_STR);
            $st->bindParam(":telefono", $data['telefono'], PDO::PARAM_STR);
            $st->bindParam(":direccion", $data['direccion'], PDO::PARAM_STR);
            $st->bindParam(":codigo_postal", $data['codigo_postal'], PDO::PARAM_STR);
            $st->bindParam(":id_genero", $data['id_genero'], PDO::PARAM_INT);
            $st->bindParam(":id_tratamiento", $data['id_tratamiento'], PDO::PARAM_INT);
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
        $sql = "UPDATE paciente SET nombre=:nombre, curp=:curp , rfc=:rfc, nacimiento=:nacimiento, telefono=:telefono, direccion=:direccion, codigo_postal=:codigo_postal, id_genero=:id_genero, id_tratamiento=:id_tratamiento, id_consultorio=:id_consultorio    
        where id_paciente= :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
        $st->bindParam(":curp", $data['curp'], PDO::PARAM_STR);
        $st->bindParam(":rfc", $data['rfc'], PDO::PARAM_STR);
        $st->bindParam(":nacimiento", $data['nacimiento'], PDO::PARAM_STR);
        $st->bindParam(":telefono", $data['telefono'], PDO::PARAM_STR);
        $st->bindParam(":direccion", $data['direccion'], PDO::PARAM_STR);
        $st->bindParam(":codigo_postal", $data['codigo_postal'], PDO::PARAM_STR);
        $st->bindParam(":id_genero", $data['id_genero'], PDO::PARAM_INT);
        $st->bindParam(":id_tratamiento", $data['id_tratamiento'], PDO::PARAM_INT);
        $st->bindParam(":id_consultorio", $data['id_consultorio'], PDO::PARAM_INT);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    //Eliminar registro
    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM paciente WHERE id_paciente=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }
}
$paciente = new Paciente;
?>