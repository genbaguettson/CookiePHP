<?php

namespace Model;

class UserModel {
    // TMP
    private $dbConnection;
    
    private $email;
    private $password;

    function __construct() {
        echo "I am ".__CLASS__." !";
        
        $user = 'baguettson';
        $pass = 'root';

        $this->dbConnection = new \PDO('mysql:host=localhost;dbname=testCookie', $user, $pass);
    }

    function save() {
        error_log("Saving info to the database");

        $request = $this->dbConnection->prepare('INSERT INTO users (email, password) VALUES (?, ?)');
        $request->execute([$this->email, $this->password]);
    }

    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function getPassword() {
        return $this->password;
    }

    function setPassword($password) {
        $this->password = $password;
    }
}