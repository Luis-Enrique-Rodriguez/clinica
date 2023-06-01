<?php
require_once(__DIR__."/sistema.php");
class Consultorio extends Sistema
{
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from consultorio";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from consultorio where id_consultorio=:id";
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
        $sql = "INSERT INTO consultorio (consultorio) VALUES (:consultorio)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":consultorio", $data['consultorio'], PDO::PARAM_STR);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }
    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE consultorio SET consultorio = :consultorio where id_consultorio= :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":consultorio", $data['consultorio'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM consultorio WHERE id_consultorio=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
$consultorio = new Consultorio;
?>