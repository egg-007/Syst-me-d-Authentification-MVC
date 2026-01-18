<?php

require_once "../models/Role.php";
require_once "../../config/database.php";

class authService {

    private $db;

    public function __construct(PDO $database){
        $this->db = $database;
    }
    public function register($data): int{
        $passwordHash = password_hash($data['password'], PASSWORD_BCRYPT);
        $data['password'] = $passwordHash;
        $query = "INSERT INTO users (role_id, fullname, email, password, created_at) 
                  VALUES (:role_id, :fullname, :email, :password, :created_at)";
        $stmt = $this->db->prepare($query);
        $stmt->execute($data);
        return (int) $this->db->lastInsertId();
    }
    public function login($email, $password): ?User{
        $qry = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($qry);
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result && password_verify($password, $result['password'])){
            $user = new User($result['fullname'], $result['email'], $result['password'], $result['role_id']);
            $user->setId($result['id']);
            $user->setCreated_at($result['created_at']);
            $user->setupdated_at($result['updated_at']);
            return $user;
        }
        return null;
    }
    public function logout(){
        session_start();
        session_unset();
        session_destroy();
    }
    public function requireRole($role){
        session_start();
        if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== $role) {
            header("Location: /login");
            exit();
        }
    }
    public function createSession(User $user){
        session_start();
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['user_email'] = $user->getEmail();
        $_SESSION['user_role'] = $user->getRoleId();
    }
}
