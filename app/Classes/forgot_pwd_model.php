<?php

declare(strict_types = 1);

class Forgotpwdmodel extends Dbh{
    private $verify_email;
    private $new_pwd;
    private $confirm_pwd;

    public function __construct(string $verify_email, string $new_pwd, string $confirm_pwd){
        $this -> verify_email = $verify_email;
        $this -> new_pwd = $new_pwd;
        $this -> confirm_pwd = $confirm_pwd;
    }

    public function isEmailRegistered(string $verify_email){
        $query = "SELECT email FROM users WHERE email = :verify_email;";
        $stmt = $this -> connect() -> prepare($query);
        $stmt -> bindParam(":verify_email", $verify_email);
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

    public function updatePassword(string $verify_email, string $confirm_pwd){
        $query = "UPDATE users SET pwd = :confirm_pwd WHERE email = :verify_email;";
        $stmt = $this -> connect() -> prepare($query);

        $options = [
            "cost" => 12
        ];
        $hashedPwd = password_hash($confirm_pwd, PASSWORD_BCRYPT, $options);

        $stmt -> bindParam(":confirm_pwd", $hashedPwd);
        $stmt -> bindParam(":verify_email", $verify_email);
        $stmt -> execute();
    }
}