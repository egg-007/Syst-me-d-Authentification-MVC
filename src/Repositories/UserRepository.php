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

        $passwordHash = password_hash($data['password'], PASSWORD_BCRYPT);
        $data['password'] = $passwordHash;
        $query = "INSERT INTO users (role_id, fullname, email, password, created_at) 
                  VALUES (:role_id, :fullname, :email, :password, :created_at)";
        $stmt = $this->db->prepare($query);
        $stmt->execute($data);
        return (int) $this->db->lastInsertId();
    }

    public function getByEmail($email): ?User{
        $qry = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($qry);
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result){
            $user = new User($result['fullname'], $result['email'], $result['password'], $result['role_id']);
            $user->setId($result['id']);
            $user->setCreated_at($result['created_at']);
            $user->setupdated_at($result['updated_at']);
            return $user;
        }
        return null;
    }

    public function getById($id): ?User{
        $qry = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($qry);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result){
            $user = new User($result['fullname'], $result['email'], $result['password'], $result['role_id']);
            $user->setId($result['id']);
            $user->setCreated_at($result['created_at']);
            $user->setupdated_at($result['updated_at']);
            return $user;
        }
        return null;
    }

}