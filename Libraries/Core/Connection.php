<?php

//conexão à bd
class Connection
{
    private $connect;

    public function __construct()
    {
        $connectionString = "mysql:hos=" . DB_HOST . ";dbname=" . DB_NAME . ";.DB_CHARSET.";
        try {
            $this->connect = new PDO($connectionString, DB_USER, DB_PASSWORD);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            throw new Exception("ERROR: " . $e->getMessage());
        }
    }
    public function connect(): PDO
    {
        return $this->connect;
    }
}
