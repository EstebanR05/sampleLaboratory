<?php

require_once '../services/Patients.class.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['name']) && isset($_GET['birthDate']) && isset($_GET['address'])){
    Patients::createPatients($_GET['name'], $_GET['birthDate'], $_GET['address']);
}
