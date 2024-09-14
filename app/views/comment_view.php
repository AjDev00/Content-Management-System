<?php

declare(strict_types = 1);

class Commentview{
    public function displayError(){
        if(isset($_SESSION["commenting_error"])){
            $errors = $_SESSION["commenting_error"];

            foreach($errors as $error){
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo $error;
            }

            unset($_SESSION["commenting_error"]);
        }
    }

}