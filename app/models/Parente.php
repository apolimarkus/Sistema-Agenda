<?php

namespace app\models;
use app\core\Model;

class Parente extends Model
{
    public function lista()
    {
        $sql = "SELECT * FROM parente";
        $qry = $this->db->query($sql);
        return $qry->fetchAll(\PDO::FETCH_OBJ);
    }

    public function inserir($parente)
    {
        $sql = "INSERT INTO parente SET
        nome = :nome,
        dtnasc = :dtnasc,
        cpf = :cpf,
        celular = :celular,
        email = :email,
        relacionamento = :relacionamento,
        endereco = :endereco
        ";

        $qry = $this->db->prepare($sql);
        $qry->bindValue(":nome", $parente->nome);
        $qry->bindValue(":dtnasc", $parente->dtnasc);
        $qry->bindValue(":cpf", $parente->cpf);
        $qry->bindValue(":celular", $parente->celular);
        $qry->bindValue(":email", $parente->email);
        $qry->bindValue(":relacionamento", $parente->relacionamento);
        $qry->bindValue(":endereco", $parente->endereco);
        $qry->execute();

        return $this->db->lastInsertId();
    }

}