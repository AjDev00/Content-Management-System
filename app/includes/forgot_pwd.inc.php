<?php

declare(strict_types = 1);

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $verify_email = $_POST["verify_email"];
    $new_pwd = $_POST["new_pwd"];
    $confirm_pwd = $_POST["confirm_pwd"];

    try{
        require_once "../Classes/dbh.php";
        require_once "../Classes/forgot_pwd_model.php";
        require_once "../Classes/forgot_pwd_contr.php";

        $forgotpwdmodel = new Forgotpwdmodel($verify_email, $new_pwd, $confirm_pwd);
        $forgotpwdcontrol = new Forgotpwdcontrol($verify_email, $new_pwd, $confirm_pwd);

        $errors = [];
        if($forgotpwdcontrol -> isInputEmpty($verify_email, $new_pwd, $confirm_pwd)){
            $errors["empty_input"] = "Fill all inputs";
        }

        if($forgotpwdcontrol -> isEmailInvalid($verify_email)){
            $errors["invalid_email"] = "EMAIL IS INCORRECT!";
        }

        if($forgotpwdcontrol -> isPasswordInputsInvalid($new_pwd, $confirm_pwd)){
            $errors["pwdinput_invalid"] = "Cannot verify new password.";
        }

        if($forgotpwdmodel -> isEmailRegistered($verify_email) && !($forgotpwdcontrol -> isInputEmpty($verify_email, $new_pwd, $confirm_pwd)) && !($forgotpwdcontrol -> isPasswordInputsInvalid($new_pwd, $confirm_pwd))){
            $forgotpwdmodel -> updatePassword($verify_email, $confirm_pwd);

            header("Location: ../login.php");
            die();
        }
        else if(!($forgotpwdmodel -> isEmailRegistered($verify_email))){
            $errors["unregistered_email"] = "Email not registered.";
        }

        require_once "config.inc.php";

        if($errors){
            $_SESSION["error_verifying_email"] = $errors;

            header("Location: ../forgot_password.php");
            die();
        }

        //close the connection.
        $pdo = null;
        $stmt = null;

        die();
    } 
    catch(PDOException $e) {
        die("Query failed: " . $e -> getMessage());
    }
}
else{
    header("Location: ../login.php");
    die();
}