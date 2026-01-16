<?php

require_once "../models/user.php";
require_once "../../config/database.php";

class UserRepository extends User{

    private $db;

    public function __construct($fullName,$email,$password,$role_id,PDO $database){
        parent::__construct($fullName,$email,$password,$role_id);
        $this->db = $database;
    }
    public function getAll(){
        $qry = "SELECT * FROM users";
        $stmt = $this->db->prepare($qry);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function insertUser($data){
        $query = "INSERT INTO users (role_id, fullname, email, password, created_at) 
                  VALUES (:role_id, :fullname, :email, :password, :created_at)";
        $stmt = $this->db->prepare($query);
        $stmt->execute($data);
        //return last id
        return (int) $this->db->lastInsertId();
    }
}