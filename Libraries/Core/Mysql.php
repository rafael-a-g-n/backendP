<?php

class Mysql extends Connection
{
    private $connection;
    private $strquery;
    private $arrValues;

    public function __construct()
    {
        $this->connection = new Connection();
        $this->connection = $this->connection->connect();
    }

    //inserir dados
    public function insert(string $query, array $arrValues)
    {
        $this->strquery = $query;
        $this->arrValues = $arrValues;
        $insert = $this->connection->prepare($this->strquery);
        $resInsert = $insert->execute($this->arrValues);
        if ($resInsert) {
            $lastInsert = $this->connection->lastInsertId();
        } else {
            $lastInsert = 0;
        }
        return $lastInsert;
    }

    //obter uma entrada de dados
    public function select(string $query, array $arrValues = [])
    {
        $result = false;
        $stmt = $this->connection->prepare($query);
        if ($stmt) {
            if ($stmt->execute($arrValues)) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        return $result;
    }


    //obter todas as entradas
    public function select_all(string $query)
    {
        $this->strquery = $query;
        $result = $this->connection->prepare($this->strquery);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    //atualizar
    public function update(string $query, array $arrValues)
    {
        $this->strquery = $query;
        $this->arrValues = $arrValues;
        $update = $this->connection->prepare($this->strquery);
        $resExecute = $update->execute($this->arrValues);
        return $resExecute;
    }

    //apagar
    public function delete(string $query, array $arrValues = [])
    {
        $result = false;
        $stmt = $this->connection->prepare($query);
        if ($stmt) {
            if ($stmt->execute($arrValues)) {
                $result = true;
            }
        }
        return $result;
    }
}
