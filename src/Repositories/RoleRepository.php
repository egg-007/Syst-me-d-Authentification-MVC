<?php

require_once "../models/Role.php";
require_once "../../config/database.php";

class RoleRepository extends Role{

    private $db;

    public function __construct(PDO $database){
        $this->db = $database;
    }

    public function getNameById($id):string{
        $qry = "SELECT name FROM roles WHERE id = :id";
        $stmt = $this->db->prepare($qry);
        return $stmt->execute(['id' => $id]);
    }
}