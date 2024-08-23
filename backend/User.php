
<?php

class User
{
    private $conn;
    private $table_name = '';
    public $name;
    public $email;
    public $phone;
    public $address;
    public $password;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getUsers(){

    }

    public function getUserById(){

    }

    public function createUser(){

    }

    public function updateUser(){

    }

    public function deleteUser(){

    }
}

?>