<?php

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start(); 

//checking if our current session id is our user id; if the user is logged into the website.
if(isset($_SESSION["user_id"])){
    if(!isset($_SESSION['last_regeneration'])){

        regenerate_session_id_loggedin();
    }
    else{
        $interval = 60 * 30;
    
        if(time() - $_SESSION['last_regeneration'] >= $interval){
    
            regenerate_session_id_loggedin();
        }
    }
}

//if he isn't logged in, then regenerate a new session id every 30mins.
else{
    if(!isset($_SESSION['last_regeneration'])){

        regenerate_session_id();
    }
    else{
        $interval = 60 * 30;
    
        if(time() - $_SESSION['last_regeneration'] >= $interval){
    
            regenerate_session_id();
        }
    }
}

//function to regenerate a new id that will append with the user's id when logged into the website.
function regenerate_session_id_loggedin(){
    session_regenerate_id(true);

    $userId = $_SESSION["user_id"];
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $userId;
    session_id($sessionId);

    $_SESSION['last_regeneration'] = time();
}

//function to regenerate a new session id if we are not logged into the website.
function regenerate_session_id(){

    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();
}