<?php

class Anuncios extends Model
{
    public function getQuantidade()
    {
        $sql = "SELECT COUNT(*) as c FROM anuncios";
        $sql = $this->db->query($sql);

        print_r($sql);

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            return $sql['c'];
        } else {
            return 0;
        }
    }
}