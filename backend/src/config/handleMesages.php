<?php

require_once 'ConexionDataBase.php';

class handleMesages
{
    public  function __construct() {}

    public static function hanldeResponse($resp)
    {
        if ($resp) {
            header('Content-Type: application/json');
            header('HTTP/1.1 201 Ejecutado correctamente');
        } else {
            header('HTTP/1.1 404 No se pudo realizae correctamente');
            echo json_encode(['error' => 'No se pudo realizar correctamente']);
        }
    }

    public static function hanldeConexion()
    {
        $database = new ConexionDataBase();
        return $database->conectar();
    }
}
