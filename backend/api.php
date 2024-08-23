<?php

require_once 'ConexionDataBase.php';
require_once 'User.php';

$db = new ConexionDataBase();
$db->conectar();
$user = new User($db);


?>