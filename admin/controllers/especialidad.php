<?php
require_once(__DIR__."/sistema.php");
class Especialidad extends Sistema
{
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from especialidad";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from especialidad where id_especialidad=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function new ($data)
    {
        $this->db();
        $sql = "INSERT INTO especialidad (especialidad) VALUES (:especialidad)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":especialidad", $data['especialidad'], PDO::PARAM_STR);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }
    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE especialidad SET especialidad = :especialidad where id_especialidad= :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":especialidad", $data['especialidad'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM especialidad WHERE id_especialidad=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
$especialidad = new Especialidad;
?>