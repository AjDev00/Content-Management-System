<?php

declare(strict_types = 1);

class Loginview{
    public function displayError(){
        if(isset($_SESSION["error_login"])){
            $errors = $_SESSION["error_login"];

            foreach($errors as $error){
                
                echo "<p>" . $error . "</p>";
            }

            unset($_SESSION["error_login"]);
        }
    }

    public function displayName(){
        if(isset($_SESSION["user_id"])){
            if(isset($_SESSION["user_username"])){
                $user = $_SESSION["user_username"];
    
                echo "<p>" . "Hello, " . $user . "</p>";
            }
        }
    }

    public function displayContent(){
        if(isset($_SESSION["user_content"])){
            $cont = $_SESSION["user_content"];

            echo $cont;
        }
    }
}