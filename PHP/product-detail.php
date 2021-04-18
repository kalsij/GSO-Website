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



        $id = $_REQUEST["id"];
        $myfile = fopen("../Data/productList.txt", "r") or die("Unable to open file!");
                                    
        while(!feof($myfile)) {
            $line = fgets($myfile);
            if (strlen($line) < 5){
            break;
            }

            $elements = explode(";", $line);
            if (strcmp($id, $elements[0]) == 0) {
                  $title=$elements[2];
            }
        }                         
        fclose($myfile);
       
        $js_file = "../Javascript/script.js";

      //  include("header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    //Bootstrap
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    //Style
    <link rel="stylesheet" type="text/css" href="../Styles/newStyle.css" />
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
                        <li><a href="SignUp.html">Sign up</a></li>
                        <li><a href="SignIn.html">Sign in</a></li>
                    </ul>
                </li>
            </div>

            <a href="ShoppingCart.php"><img src="../Media/cart_logo.png" alt="Shopping Cart" width="50px" height="50px"
                    style="float:right"></a>
    </nav>
        <!--product description sheet-->
        <h1> </h1>
        <div class="container shadow-lg " >
            
            <?php

                $id = $_REQUEST["id"];
                $myfile = fopen("../Data/productList.txt", "r") or die("Unable to open file!");
                               
                while(!feof($myfile)) {
                    $line = fgets($myfile);
                    if (strlen($line) < 5){
                        break;
                    }
                            
                    $elements = explode(";", $line);
                    if (strcmp($id, $elements[0]) == 0) {
                        //echo "Id found" . $elements[3];


                        echo "<div class=\"row\">";

                    
                            echo "<div class=\"col-md-6 \" >";
                                echo"<img class=\"picture\" src=\"../$elements[1]\" alt= \" $elements[2] \" style=\"width:90%; display: block; margin: 0 auto; margin-bottom: 20px;\">";
                            echo "</div>";
                
                            echo "<div class=\" col-md-5 \" style = \" margin-right: 50px\">";
                                echo "<h4 ><b>$elements[2]</b></h4>";
                                     echo "<br/>";
                                        
                                    echo "<h3  style=\"color:red\">";
                                        echo "CAD $elements[6]";
                                    echo "</h3>";
                                    echo "<p>";
                                        echo "($elements[8])";
                                    echo "</p>";

                                    echo "
                                    <form action = \"ShoppingCart.php\" method = \"POST\">
                                    <input class = \"product-quantity ml-2 mr-2\" min = \"1\"type = \"number\" name = \"quantity\" id=\"totalMacaroni\" value=\"1\" style=\"width:20%;\">
                                
                                    <!-- <button  onclick=\"incrementCola()\">+</button>
                                    <p id=\"quantity\" style=\"display: inline;\" >1</p>
                                    <button  onclick=\"decrementCola()\">-</button> -->

                                    <div class=\"btn\">
                                        <input type=\"submit\" onclick=\"addLemonCart()\" value=\"Add to cart\" style = \"background-color: black; color : white\">
                                    </div>
                                    <div>
                                        <p id=\"addedCola\"></p>
                                        <p id = \"totalCola\"></p>
                                    </div>
                                
                                    </form>";

                                    echo "<div style=\"padding-top: 20px;\">";
                                        echo "<button class=\"dropbtn\" onclick=\"showColaDescription()\">Product Description</button>";
                                        echo "<p id=\"colaDescription\" >$elements[7]</p>";
                                        echo "<p id=\"colaDescription\" style=\"visibility:hidden;\">$elements[7]</p>";
                                        echo "</div>";
                                        // <!-- JavaScript -->
                                    echo "<script type = \"text/javascript\" src=\"../Javascript/script.js\"></script>";
                            echo "</div>";
                        echo "</div>"; 
                        //pass elements in product page to shopping cart or other pages
                        $_SESSION["elementsProduct"] = $elements;
                    }
                }

                fclose($myfile);

            ?>

        </div>
        

        <!--Display of other products from same aisle-->
        <h1>Other related items</h1>
        <div class=" justify-content-md-center row">
                            <?php 
                                $id = $_REQUEST["id"];


                                $myfile = fopen("../Data/productList.txt", "r") or die("Unable to open file!");
                                // Output one line until end-of-file
                                $products= array();
                                $category= "";
                                while(!feof($myfile)) {
                                  $line = fgets($myfile);
                                  if (strlen($line) < 5){
                                      break;
                                  }
                            
                                  $elements = explode(";", $line);

                                  if (strcmp($id, $elements[0]) == 0) {
                                    $category=$elements[3];
                                  }

                                  array_push($products, $elements);
                                }
                                 fclose($myfile);

                                foreach($products as $elements){

                                  if (strcmp($id, $elements[0]) != 0 && strcmp($elements[3], $category) == 0) {
                                    echo "<div class=\"col-md-auto\">";
                                    echo "<div class=\"coca-cola\">";
                                        echo "<a href=\"product-detail.php?id=$elements[0]\">";
                                            echo "<img src=\"../$elements[1]\" alt= \" $elements[2] \" style=\"width:100% ; max-height:200px;\">";
                                        echo "</a>";
                                        echo "<h1 style=\"margin-top: auto; color:rgb(75, 75, 75);\">$elements[2]</h1>";
                                        echo "<p class=\"price\" style=\"color:rgb(75, 75, 75);\">$elements[6]<br/>($elements[8])</p>";
                                        echo "<p><button style=\"color:white;\">Add to Cart</button></p>";
                                    echo "</div>";
                                  echo "</div>";
                                  
                                  }  
                                }
                                
                            ?>
        </div>


<footer class="container py-4">
            <div class="row">
              <div class="col-12 col-md">
                <small class="d-block mb-3 text-muted">&copy; 2021-2022 </br> </small>
                <ul class="list-unstyled text-small">
        <li><a href="BackstoreProductList.php"class="text-muted">Backstore</a></li></ul>
              </div>
              <div class="col-6 col-md">
                <h5>Team</h5>
                <ul class="list-unstyled text-small">
                  <li><a class="text-muted">Fatema Akther</a></li>
                  <li><a class="text-muted">Julie Trinh</a></li>
                  <li><a class="text-muted">Jasmit Kalsi</a></li>
                  <li><a class="text-muted">Dzmitry Fiodarau</a></li>
                  <li><a class="text-muted">Alice Chen</a></li>
                  <li><a class="text-muted">Georgia Pitic</a></li>
                </ul>
              </div>
              <div class="col-6 col-md">
                <h5>Promotions</h5>
                <ul class="list-unstyled text-small">
                  <li><a class="text-muted">Newsletter</a></li>
                  <li><a class="text-muted">Gift cards</a></li>
                  <li><a class="text-muted">Contests</a></li>
                </ul>
              </div>
              <div class="col-6 col-md">
                <h5>About</h5>
                <ul class="list-unstyled text-small">
                  <li><a href="Contact Us.html" class="text-muted">Contact us</a></li>
                  <li><a class="text-muted">Our story</a></li>
                  <li><a class="text-muted">FAQ</a></li>
                </ul>
              </div>
            </div>
          </footer>  


    </body>

</html>

