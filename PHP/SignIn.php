<?php 
include("functions.php");

if(empty($_POST[submit])){
session_start();
$_SESSION[signinEmail] = "";
$_SESSION[signinPassword] = "";

$title = "Sign In";
$js_file = "../Javascript/signinJS.js";
include("header_SU_SI.php");
require("SignIn_body.php");
include("footer.php");
}

else if($_POST[submit]=="Sign In"){
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

        foreach($allinfo as $value){
            $user = preg_split("/[\s]+/", $value);
            if($user[4]==$_SESSION[signinEmail]){
                $exists = TRUE;
            }
        }
        if($exists){
            $wrong_password = TRUE;
            foreach($allinfo as $value){
                $user = preg_split("/[\s]+/", $value);
                if($user[4]==$_SESSION[signinEmail]){
                    if($user[5]==$_SESSION[signinPassword]){
                        $wrong_password = FALSE;
                        $_SESSION[fullName] = $user[0].$user[1];
                    }
                }
            }

            if($wrong_password){
                $title = "Sign In";
            $js_file = "../Javascript/signinJS.js";
            include("header_SU_SI.php");
            $msg = "You have the wrong password.</br>Please try again.";
            require("SignIn_body.php");
            include("footer.php");
            }
            else{
                //admin verification
                if(preg_match("/^admin[\d]{4}\@[a-z]+\.[a-z]{2,3}$/", $_SESSION[signinEmail])!=0){
                    header("Location:BackstoreProductList.php");
                    exit();
                }
                else{
                    header("Location:GroceryStore-1.php");
                    exit();
                }
            }
        }
        else{
            $title = "Sign In";
            $js_file = "../Javascript/signinJS.js";
            include("header_SU_SI.php");
            $msg = "An account under this email does not seem to exist.</br>Please try again.";
            require("SignIn_body.php");
            include("footer.php");
        }
    }
    else{
        $title = "Sign In";
        $js_file = "../Javascript/signinJS.js";
        include("header_SU_SI.php");
        require("SignIn_body.php");
        echo '<script type="text/javascript"> verif();</script>';
        include("footer.php");  
    }
}

else if($_POST[submit]=="Reset Password"){
    session_start();
    $resemail = $_POST[resetEmail];
    $respassword = $_POST[resetPassword];
    $respassword2 = $_POST[resetPassword2];
    if($resemail){$_SESSION[resetEmail] = $resemail;}
    else{$_SESSION[resetEmail] = "";}
    if($respassword){$_SESSION[resetPassword] = $respassword;}
    else{$_SESSION[resetPassword] = "";}
    if($respassword2){$_SESSION[resetPassword2] = $respassword2;}
    else{$_SESSION[resetPassword2] = "";}

    $app_res = resetVerif();
    if($app_res){
        $filename = "../Data/users.txt";
        $_allinfo = file($filename);
        $em_exists = FALSE;

        foreach($_allinfo as $value){
            $_user = preg_split("/[\s]+/", $value);
            if($_user[4]==$_SESSION[resetEmail]){
                $em_exists = TRUE;
            }
        }

        if($em_exists){
            $_SESSION[signinEmail] = "";
            $_SESSION[signinPassword] = "";
            
            $title = "Sign In";
            $js_file = "../Javascript/signinJS.js";
            include("header_SU_SI.php");    
            echo '<p style="text-align:center;margin-top:100px">Your password was reset successfully. You can now login.<p>';
            foreach($_allinfo as $key=>$value){
                $_user = preg_split("/[\s]+/", $value);
                if($_user[4]==$_SESSION[resetEmail]){
                    $_allinfo[$key] = $_user[0]." ".$_user[1]." ".$_user[2]." ".$_user[3]." ".$_user[4]." ".$_SESSION[resetPassword];
                }
            }
            $towrite = fopen($filename, w);
            foreach($_allinfo as $value){
                fputs($towrite, $value."\n");
            }
            fclose($towrite);
            require("SignIn_body.php");
            include("footer.php");
        }
        else{
            $title = "Sign In";
        $js_file = "../Javascript/signinJS.js";
        include("header_SU_SI.php");
        require("SignIn_body.php");
        $emailVal = $_SESSION[resetEmail];
        $pass1Val = $_SESSION[resetPassword];
        $pass2Val = $_SESSION[resetPassword2];
        echo '<script type="text/javascript"> verif();
        forgot();
        var em = document.getElementById("email2");
        var resPass1 = document.getElementById("pass2");
        var resPass2 = document.getElementById("pass3");
        em.value = "';
        print $emailVal;
        echo '"; 
        resPass1.value = "';
        print $pass1Val;
        echo '";
        resPass2.value = "';
        print $pass2Val;
        echo '";
        sendEmail();</script>';
        echo '<p style="text-align:center;color=red;">There is no existing account under the email you entered.</p>';

        include("footer.php");
        }
    }
    else{
        $title = "Sign In";
        $js_file = "../Javascript/signinJS.js";
        include("header_SU_SI.php");
        require("SignIn_body.php");
        $emailVal = $_SESSION[resetEmail];
        $pass1Val = $_SESSION[resetPassword];
        $pass2Val = $_SESSION[resetPassword2];
        echo '<script type="text/javascript"> verif();
        forgot();
        var em = document.getElementById("email2");
        var resPass1 = document.getElementById("pass2");
        var resPass2 = document.getElementById("pass3");
        em.value = "';
        print $emailVal;
        echo '"; 
        resPass1.value = "';
        print $pass1Val;
        echo '";
        resPass2.value = "';
        print $pass2Val;
        echo '";
        sendEmail();</script>';

        include("footer.php");

    }
}

?>