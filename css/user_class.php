<?php

class User {
    private $name;
    private $email;
    private $password;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
        $this->password = null;
    }

    public function setpassword($password) {
        $this->password = $password;
    }
    public function getpassword() {
        return $this->password ;
    }
    public function setname($name) {
        $this->name = $name;
    }
    public function setemail($email) {
        $this->email = $email;
    }
    public function getname() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function login($email, $password) {
        if ($this->email === $email && $this->password === $password) {
            echo "Login successful!";
        } else {
            echo "Invalid email or password.";
        }
    }
}
?>