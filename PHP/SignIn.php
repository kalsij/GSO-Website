<?php 
include("functions.php");

if(empty($_POST[signinSubmit])){
session_start();
$_SESSION[signinEmail] = "";
$_SESSION[signinPassword] = "";

$title = "Sign In";
$js_file = "../Javascript/signinJS.js";
include("header_SU_SI.php");
require("SignIn_body.php");
include("footer");
}

else if($_POST[signinSubmit]=="Sign In"){
    session_start();
    $email = $_POST[signinEmail];
    $password = $_POST[signinPassword];
    if($email){ $_SESSION[signinEmail] = $email;}
    else {$_SESSION[signinEmail] = "";}
    if($password){ $_SESSION[signinPassword] = $password;}
    else { $_SESSION[signinPassword] = "";}

    $app = signinVerif();
    if($app){
        $filename = "../Data/users.txt";
        $allinfo = file($filename);
        $exists = FALSE;

        foreach($allinfo)
    }
    else{
        $title = "Sign In";
        $js_file = "../Javascript/signinJS.js";
        include("header_SU_SI.php");
        require("SignIn_body.php");
        echo '<script type="text/javascript"> verif()</script>';
        include("footer");  
    }
}

?>