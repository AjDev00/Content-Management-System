<?php

declare(strict_types = 1);

class Forgotpwdcontrol extends Forgotpwdmodel{
    public function isInputEmpty(string $verify_email, string $new_pwd, string $confirm_pwd){
        if(empty($verify_email) || empty($new_pwd) || empty($confirm_pwd)){

            return true;
        }
        else{
            return false;
        }
    }

    public function isEmailInvalid(string $verify_email){
        if(!filter_var($verify_email, FILTER_VALIDATE_EMAIL)){

            return true;
        }
        else{
            return false;
        }
    }

    public function isPasswordInputsInvalid(string $new_pwd, string $confirm_pwd){
        if($new_pwd !== $confirm_pwd){

            return true;
        }
        else{
            return false;
        }
    }
}