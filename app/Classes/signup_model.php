<?php

declare(strict_types = 1);

class Signupmodel extends Dbh{
    private $username;
    private $pwd;
    private $email;
    private $content;
    private $phonenumber;

    public function __construct(string $username, string $pwd, string $email, string $content, string $phonenumber){
        $this -> username = $username;
        $this -> pwd = $pwd;
        $this -> email = $email;
        $this -> content = $content;
        $this -> phonenumber = $phonenumber;
    }

    public function insertUser(string $username, string $pwd, string $email, string $content, string $phonenumber){
        $query = "INSERT INTO users(username, pwd, email, content, phonenumber) VALUES (:username, :pwd, :email, :content, :phonenumber);";
        $stmt = $this -> connect() -> prepare($query);

        $options = [
            "cost" => 12
        ];
        $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

        $stmt -> bindParam(":username", $username);
        $stmt -> bindParam(":pwd", $hashedPwd);
        $stmt -> bindParam(":email", $email);
        $stmt -> bindParam(":content", $content);
        $stmt -> bindParam(":phonenumber", $phonenumber);

        $stmt -> execute();
    }

    public function isUsernameTaken(string $username){
        $query = "SELECT username FROM users WHERE username = :username;";
        $stmt = $this -> connect() -> prepare($query);
        $stmt -> bindParam(":username", $username);
        $stmt -> execute();

        $result = $stmt -> fetch(PDO:: FETCH_ASSOC);
        return $result;

        if($result){

            return true;
        }
        else{
            return false;
        }
    }

    public function isEmailRegistered(string $email){
        $query = "SELECT email FROM users WHERE email = :email;";
        $stmt = $this -> connect() -> prepare($query);
        $stmt -> bindParam(":email", $email);
        $stmt -> execute();

        $result = $stmt -> fetch(PDO:: FETCH_ASSOC);
        return $result;

        if($result){

            return true;
        }
        else{
            return false;
        }
    }
}