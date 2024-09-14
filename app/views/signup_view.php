<?php

declare(strict_types = 1);

class Signupview{
    public function displayError(){
        if(isset($_SESSION["error_signup"])){
            $errors = $_SESSION["error_signup"];

            foreach($errors as $error){
                echo "<br>";
                echo "<p>" . $error . "</p>";
            }

            unset($_SESSION["error_signup"]);
        }
    }
}