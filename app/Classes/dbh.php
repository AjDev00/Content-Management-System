<?php

declare(strict_types = 1);

class Dbh{
    private $dsn = "mysql:host=localhost;dbname=cms";
    private $dbusername = "root";
    private $dbpassword = "";

    public function connect(){
        try {
            $pdo = new PDO($this -> dsn, $this -> dbusername, $this -> dbpassword);
            $pdo -> setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
    
            return $pdo;
        } 
        catch (PDOException $e) {
            echo "Connection failed: " . $e -> getMessage();
        }
    }
}