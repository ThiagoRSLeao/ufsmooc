<?php
namespace App\Classes;

Class UserSession
{
    private $id;
    private $name;
    private $email;
    private $type_user;    
    private $isTeacher;

    public function __construct($id, $name, $email, $type_user)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->type_user = $type_user;    
        if($this->type_user == 1)
        {
            $this->isTeacher = true;
        }
        else
        {
            $this->isTeacher = false;
        }
    }
    public function getId()
    {
        return $this->id;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function isTeacher()
    {
        return $this->isTeacher;
    }
}