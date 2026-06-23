<?php

/*

Level 2: Constructors, Encapsulation, Getters/Setters
4. User System

Private properties: username, password
Constructor to initialize
Getter for username
Method: verifyPassword($input)

Goal: Data hiding + controlled access
*/


class User {

    private $userName;
    private $password;

    public function __construct($userName, $password) {
        $this->userName = $userName;
        $this->password = $password;
    }

    public function getName() {
        return $this->userName;
    }

    public function verifyPassword($input) {
        if ($this->password === $input) {
            echo "Verification Successful\n";
            return true;
        } else {
            echo "Invalid Credentials\n";
            return false;
        }
    }
}

$pass = new User("battle_angel", "password");
$pass->verifyPassword("password");
echo $pass->getName();