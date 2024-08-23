<?php
class ConexionDataBase
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $db_name = 'samplelaboratory';

    public function conectar()
    {
        $hostDB = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";";

        try {
            $conexion = new PDO($hostDB, $this->username, $this->password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
    }
}
