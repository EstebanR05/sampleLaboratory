<?php

class ConexionDataBase
{

    private $host = 'localhost';
    private $username  = 'root';
    private $password  = '';
    private $db_name = 'TrelloManager';
    public $conexion = null;

    public function __construct() {}

    public function conectar()
    {
        try {
            $this->conexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            return $this->conexion->exec("set names utf8");
        } catch (PDOException $e) {
            echo "error de conexion: " . $e->getMessage();
        }
    }
}
