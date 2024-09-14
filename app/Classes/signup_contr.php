<?php

declare(strict_types = 1);

class Signupcontrol extends Signupmodel{
    public function isInputEmpty(string $username, string $pwd, string $email, string $content, string $phonenumber){
        if(empty($username) || empty($pwd) || empty($email) || empty($content) || empty($phonenumber)){

            return true;
        }
        else{
            return false;
        }
    }

    public function isPhoneNumberInvalid(string $phonenumber){
        if(!is_numeric($phonenumber)){

            return true;
        }
        else{
            return false;
        }
    }

    public function isEmailInvalid(string $email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

            return true;
        }
        else{
            return false;
        }
    }
}