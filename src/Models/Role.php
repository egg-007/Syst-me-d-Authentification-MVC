<?php

class Role{
    private ?int $id;
    private string $name;
    private string $description;

    public function __construct($name,$description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public function getId(): ?int{
        return $this->id;
    }
    public function getName(): string{
        return $this->name;
    }
    public function getDescription(): string{
        return $this->description;
    }


    public function setId($id){
        $this->id = $id;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setDescription($description){
        $this->description = $description;
    }

}