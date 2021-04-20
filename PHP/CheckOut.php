<?php
session_start();
    // session_unset();
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Check Out</title>
    <meta chartset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="../Styles/newStyle.css"/>
</head>

<body>
    <!-- Nav Bar -->
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

                    <li><a href="Fruits and vegetables.php">Fruits and Vegetables</a></li>
                    <li><a href="Meat.php">Meat</a></li>
                    <li><a href="Dairy.php">Dairy</a></li>
                    <li><a href="Bread.php">Bread</a></li>
                    <li><a href="drinks.php">Drinks</a></li>
                    <li><a href="pasta.php">Pasta</a></li>
                    </a>
                </li>
            </ul>

            <li><a href="#">Account</a>
                <ul>
                    <?php print $sign1;
                        print $sign2;?>
                </ul>
            </li>
        </div>

        <a href="ShoppingCart.php"><img src="../Media/cart_logo.png" alt="Shopping Cart" width="50px" height="50px"
                style="float:right"></a>
    </nav>

    <!-- Check Out -->
    <h1 style="margin-top:2.5cm;">New products are arriving soon</h1>
    <h2>In stock on May 1st 2021</h2>
    <h2>Mark your calendars!</h2>
    </br></br>

    <!--footer-->        
    <?php 
include("footer.php");
?>