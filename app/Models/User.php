<?php
namespace App\Models;

class User
{

    protected $first_name;

    protected $last_name;

    protected $email;
    
    public function setFirstName($firstName) 
    {
        $this->first_name = $firstName;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setLastName($lastName) 
    {
        $this->last_name = $lastName;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getData() {
        return [
            'full_name' => $this->first_name . ' ' . $this->last_name,
            'email' => $this->email
        ];
    }
}