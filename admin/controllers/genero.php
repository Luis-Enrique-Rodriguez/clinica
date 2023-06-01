<?php
require_once(__DIR__."/sistema.php");
class Genero extends Sistema
{
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from genero";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from genero where id_genero=:id";
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
        $sql = "INSERT INTO genero (genero) VALUES (:genero)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":genero", $data['genero'], PDO::PARAM_STR);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }
    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE genero SET genero = :genero where id_genero= :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":genero", $data['genero'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM genero WHERE id_genero=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
$genero = new Genero;
?>