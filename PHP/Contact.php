<?php 
if($_POST["submit"]){
$file1 = file('Data/users.txt');
$file2 = file('Data/orders.txt');
$U = $_POST("username");
$O = $_POST("ordernumber");

foreach($file as $line) {
    if(strpos($line, $u)){

        $found = true;
    }
    else{
        header("Location: localhost/SignUp.php");
    }
    if()


  }
}
?>