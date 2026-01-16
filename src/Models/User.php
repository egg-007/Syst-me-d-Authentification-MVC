<?php

class User{
    private ?int $id;
    private ?int $role_id;
    private string $fullName;
    private string $email;
    private string $password;
    private string $created_at;
    private string $updated_at;

    public function __construct($fullName,$email,$password,$role_id)
    {
        $this->fullName = $fullName;
        $this->email = $email;
        $this->$role_id = $role_id;
        $this->password = $password;
    }

    public function getId(): ?int{
        return $this->id;
    }
    public function getRoleId(): int{
        return $this->role_id;
    }
    public function getEmail(): string{
        return $this->email;
    }
    public function getPassword(): string{
        return $this->password;
    }
    public function getCreated_at(): string{
        return $this->created_at;
    }
    public function getupdated_at(): string{
        return $this->updated_at;
    }


    public function setId($id){
        $this->id = $id;
    }
    public function setRoleId($role_id){
        $this->role_id = $role_id;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setCreated_at($created_at){
        $this->created_at = $created_at;
    }
    public function setupdated_at($updated_at){
        $this->updated_at = $updated_at;
    }
}