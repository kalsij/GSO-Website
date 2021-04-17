<?php
include("functions.php");

//NO SUBMIT INFO YET OR RESET BUTTON PRESSED
if(empty($_POST[signupSubmit])||$_POST[signupSubmit]=="Reset"){
    session_start();
    $_SESSION[firstName] = "";
    $_SESSION[lastName] = "";
    $_SESSION[gender] = "";
    $_SESSION[maleGender] = "";
    $_SESSION[femaleGender] = "";
    $_SESSION[postalCode] = "";
    $_SESSION[signupEmail] = "";
    $_SESSION[signupEmail2] = "";
    $_SESSION[signupPassword] = "";
    $_SESSION[signupPassword2] = "";
    $_SESSION[conditions] = "";
    $title = "Sign Up";
    $js_file = "../Javascript/signupJS.js";
    include("header_SU_SI.php");
    require("SignUp_body.php");
    include("footer.php");
}

//CREATE ACCOUNT BUTTON PRESSED
else if($_POST[signupSubmit]=="Create Account"){
    session_start();
    $fN = $_POST[firstName];
    $lN = $_POST[lastName];
    $g =$_POST[gender];
    $pC = $_POST[postalCode];
    $sE = $_POST[signupEmail];
    $sE2 = $_POST[signupEmail2];
    $sP = $_POST[signupPassword];
    $sP2 = $_POST[signupPassword2];
    $cond = $_POST[conditions];
    if ( $fN ) {  $_SESSION[firstName] = $fN; }
    else $_SESSION[firstName] = "";
    if ( $lN ) {  $_SESSION[lastName] = $lN; }
    else $_SESSION[lastName] = "";
    if( $g ){
        if($g == "Male"){
            $_SESSION[gend] = "Male";
            $_SESSION[femaleGender] = "";
            $_SESSION[maleGender] = "checked";
        }
        else if($g == "Female"){
            $_SESSION[gend] = "Female";
            $_SESSION[maleGender] = "";
            $_SESSION[femaleGender] = "checked";
        }
    }
    if ( $pC ) {  $_SESSION[postalCode] = $pC; }
    else $_SESSION[postalCode] = "";
    if ( $sE ) {  $_SESSION[signupEmail] = $sE; }
    else $_SESSION[signupEmail] = "";
    if ( $sE2 ) {  $_SESSION[signupEmail2] = $sE2; }
    else  $_SESSION[signupEmail2] = "";
    if ( $sP ) {  $_SESSION[signupPassword] = $sP; }
    else $_SESSION[signupPassword] = "";
    if ( $sP2 ) {  $_SESSION[signupPassword2] = $sP2; }
    else $_SESSION[signupPassword2] = "";
    if(isset($cond)){ $_SESSION[conditions] = "checked"; }
    else $_SESSION[conditions] = "";

    $app = approve();

    //IF ENTERED VALUES APPROVED
    if($app){
        $filename = "../Data/users.txt";
        $allinfo = file($filename);
        $already_exists = FALSE;

        //verification that no account with the entered email already exists
        foreach($allinfo as $value){
            $userinfo = preg_split("/[\s]/", $value);

            if($userinfo[4]==$_SESSION[signupEmail]){
                echo "<p style=\"text-align: center; color: red;\">An account under this email already exists. Please try again.</p>";
                $already_exists = TRUE;
            }
        }

        //ACCOUNT WITH ENTERED EMAIL ALREADY EXISTS
        if($already_exists){
            $title = "Sign Up";
            $js_file = "../Javascript/signupJS.js";
            include("header_SU_SI.php");
            require("SignUp_body.php");
            echo '<script type="text/javascript"> verif()</script>';
            echo "<p style=\"text-align:center; color: red;\">An account with the email you entered already exists. </br>Please try again with a different email.</br></br><p>";
            include("footer.php");
        }
        //ACCOUNT WITH ENTERED EMAIL DOES NOT EXIST YET
        else{
            $towrite = fopen($filename, "a+");
            $post = $_SESSION[postalCode];

            //formatting postal code to have the same number of spaces for each user in the textfile
            if(preg_match("/^[A-Z]\d[A-Z]\d[A-Z]\d$/", $post)==0){
                $post = strtoupper($post);
                $array = explode(" ", $post);
                $post = "";
                foreach($array as $value){
                    $post .= $value;
                }
                $_SESSION[postalCode] = $post;
            }

            //writing the user to the textfile users.txt
            fputs($towrite,"\n");
            fputs($towrite, $_SESSION[firstName]." ".$_SESSION[lastName]." ".$_SESSION[gend]." ".$_SESSION[postalCode]." ".$_SESSION[signupEmail]." ".$_SESSION[signupPassword]." ");
            fclose($towrite);

            header("Location:redirect.php"); //redirection
            exit();
        }

    }
    //IF ENTERED VALUES NOT APPROVED
    else{
    $title = "Sign Up";
    $js_file = "../Javascript/signupJS.js";
    include("header_SU_SI.php");
    require("SignUp_body.php");
    echo '<script type="text/javascript"> verif()</script>';
    include("footer.php");
    }


}


?>