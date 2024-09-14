<?php

declare(strict_types = 1);

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];
    $content = $_POST["content"];
    $phonenumber = $_POST["phonenumber"];

    try{
        require_once "../Classes/dbh.php";
        require_once "../Classes/signup_model.php";
        require_once "../Classes/signup_contr.php";

        $signupmodel = new Signupmodel($username, $pwd, $email, $content, $phonenumber);
        $signupcontrol = new Signupcontrol($username, $pwd, $email, $content, $phonenumber);

        //ERROR HANDLING.
        $errors = [];

        if($signupcontrol -> isInputEmpty($username, $pwd, $email, $content, $phonenumber)){
            $errors["empty_input"] = "FILL IN ALL FIELDS!!";
        }

        if($signupcontrol -> isPhoneNumberInvalid($phonenumber)){
            $errors["invalid_phonenumber"] = "INPUT A CORRECT PHONENUMBER!";
        }

        if($signupcontrol -> isEmailInvalid($email)){
            $errors["invalid_email"] = "EMAIL IS INCORRECT!";
        }

        if($signupmodel -> isUsernameTaken($username)){
            $errors["username_taken"] = "Username already taken!";
        }

        if($signupmodel -> isEmailRegistered($email)){
            $errors["email_registered"] = "Email already registered!";
        }

        require_once "config.inc.php";

        if($errors){
            $_SESSION["error_signup"] = $errors;

            header("Location: ../index.php");
            die();
        }

        $signupmodel -> insertUser($username, $pwd, $email, $content, $phonenumber);

        header("Location: ../login.php");

        $pdo = null;
        $stmt = null;

        die();
    } 
    catch (PDOException $e) {
       die("Query failed: " . $e -> getMessage()); 
    }
}
else{
    header("Location: ../index.php");
    die();
}