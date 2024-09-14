<?php

declare(strict_types = 1);

class Forgotpwdview{
    public function displayError(){
        if(isset($_SESSION["error_verifying_email"])){
            $errors = $_SESSION["error_verifying_email"];

            foreach($errors as $error){
                echo "<br>";
                echo $error;
            }

            unset($_SESSION["error_verifying_email"]);
        }
    }

}