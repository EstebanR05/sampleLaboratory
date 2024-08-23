<?php
include_once __DIR__ . '/../config/ConexionDataBase.php';
include_once __DIR__ . '/controllers/Patient.php';
include_once __DIR__ . '/controllers/Sample.php';
include_once __DIR__ . '/controllers/Result.php';
include_once __DIR__ . '/../config/handleRequest.php';

$database = new ConexionDataBase();
$db = $database->conectar();

// Obtiene el método HTTP
$method = $_SERVER['REQUEST_METHOD'];

// Dependiendo del endpoint y el método, ejecuta la acción correspondiente
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));

switch ($request[0]) {
    case 'patients':
        $patient = new Patient($db);
        handlePatientRequests($method, $patient);
        break;
    case 'samples':
        $sample = new Sample($db);
        handleSampleRequests($method, $sample);
        break;
    case 'results':
        $result = new Result($db);
        handleResultRequests($method, $result);
        break;
    default:
        echo json_encode(['message' => 'Endpoint no encontrado']);
        break;
}
?>
