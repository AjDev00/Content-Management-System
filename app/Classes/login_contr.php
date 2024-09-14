<?php

declare(strict_types = 1);

class Logincontrol extends Loginmodel{
    public function isInputEmpty(string $username, string $pwd){
        if(empty($username) || empty($pwd)){

            return true;
        }
        else{
            return false;
        }
    }

    public function invalidPassword(string $pwd, string $hashedPwd){
        if(!password_verify($pwd, $hashedPwd)){
            
            return true;
        }
        else{
            return false;
        }
    }
}