<?php
require_once(__DIR__."/sistema.php");
class Tratamiento extends Sistema
{
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from tratamiento";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from tratamiento where id_tratamiento=:id";
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
        $sql = "INSERT INTO tratamiento (tratamiento) VALUES (:tratamiento)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":tratamiento", $data['tratamiento'], PDO::PARAM_STR);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }
    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE tratamiento SET tratamiento = :tratamiento where id_tratamiento= :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":tratamiento", $data['tratamiento'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM tratamiento WHERE id_tratamiento=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
$tratamiento = new Tratamiento;
?>