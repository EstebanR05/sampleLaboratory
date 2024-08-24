<?php

require_once '../services/patients.php';

$data = json_decode(file_get_contents('php://input'), true);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($data['name']) && isset($data['birthDate']) && isset($data['address'])) {
    Patients::createPatients($data['name'], $data['birthDate'], $data['address']);
}
