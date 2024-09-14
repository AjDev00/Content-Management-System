<?php

declare(strict_types = 1);

class Loginmodel extends Dbh{
    private $username;
    private $pwd;

    public function __construct(string $username, string $pwd){
        $this -> username = $username;
        $this -> pwd = $pwd;
    }

    public function getUsername(string $username){
        $query = "SELECT * FROM users WHERE username = :username;";
        $stmt = $this -> connect() -> prepare($query);
        $stmt -> bindParam(":username", $username);
        $stmt -> execute();

        $result = $stmt -> fetch(PDO:: FETCH_ASSOC);
        return $result;
    }
}