<?php 
session_start();
if(empty($_POST[logout])){

}
else{
session_unset();
}
if(empty($_SESSION[fullName])){
$sign1 = "<li><a href=\"SignUp.php\">Sign up</a></li>";
$sign2 = "<li><a href=\"SignIn.php\">Sign in</a></li>";
}
else{
    $sign1 = "<li><a href=\"\">".$_SESSION[fullName]."</a></li>";
    $sign2 = "<li><div style=\"text-align:center;\"><form method=\"post\"><input type=\"submit\" value=\"Log Out\" style=\"outline:none;border:none;background-color:Transparent;color:rgb(226, 215, 215);font-size:20px;\" name=\"logout\"/></form></div></li>";
}
$js_file = "../Javascript/script.js";
$title = "Contact";
include("header.php");
?>

        <h1 class="ProductTitle">Order Details</h1>
        <div class="container shadow-lg ">
<?php
if ($_POST['submit']) {
    $file1 = file('../Data/users.txt');
    $file2 = file('../Data/orders.txt');
    $U = $_POST["username"];
    $O = $_POST["ordernumber"];
    $line = "";
    foreach ($file1 as $line1) {
        $pos = strstr($line1, $U);
        if (strstr($line1, $U)) {
            $found1 = true;
            break;
        } 
    }
    if($found1 == 0) {
        header("Location: SignUp.php");
    }

    foreach ($file2 as $line2) {
        if (strstr($line2, $O)) {
            $line = $line2;
            $found2 = true;
            break;
        }
    }
    if($found2 == 0){
        echo "Order number does not exist"."\n";
    }
    if($found2 && empty($line)){
            echo "empty";        
    }
    $info = explode("\t",$line);
    echo "<pre>";
    echo "Order number: ".$info[0]."\n";
    echo "Date: ".$info[1]."\n";
    echo "Total before tax: ".$info[4]."\n";
    echo "Items Ordered: ".$info[6]."\n";
    echo "</pre>";

}
?>
        </div>