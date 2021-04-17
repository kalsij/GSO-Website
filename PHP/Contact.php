<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 
    <link rel="stylesheet" type="text/css" href="../Styles/newStyle.css" />
    <script type="text/javascript" src="../Javascript/Contact Us.js"></script>
</head>

    <body>
        <!--nav bar-->
        <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top" style="background-color: blue;">
            <h1 style="margin-top:0mm;color:white; font-size:50px;font-style:italic; font-weight:bold; margin-right:1cm;">
                GSO</h1>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li><a href="GroceryStore-1.html">Home</a></li>

                    <li><a href="#">Aisles</a>
                        <ul>
                            <li><a href="Fruits and vegetables.html">Fruits and Vegetables</a></li>
                            <li><a href="Meat.html">Meat</a></li>
                            <li><a href="Dairy.html">Dairy</a></li>
                            <li><a href="Bread.html">Bread</a></li>
                            <li><a href="drinks.html">Drinks</a></li>
                            <li><a href="pasta.html">Pasta</a></li>
                            </a>


                    </li>

                </ul>

                <li><a href="#">Account</a>
                    <ul>
                        <li><a href="SignUp.html">Sign up</a></li>
                        <li><a href="SignIn.html">Sign in</a></li>
                    </ul>
                </li>
            </div>

            <a href="ShoppingCart.html"><img src="/Media/cart_logo.png" alt="Shopping Cart" width="50px" height="50px"
                    style="float:right"></a>
        </nav>
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
    echo "Status: ".$info[7]."\n";
    echo "</pre>";

}
?>
        </div>