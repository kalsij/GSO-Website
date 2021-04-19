<!DOCTYPE html>
<html lang="en">

<head>
    <title>Meat</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!----------Bootstrap---------->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!----------Style---------->
    <link rel="stylesheet" type="text/css" href="../Styles/newStyle.css" />
</head>

<body>
   <!----------nav bar---------->
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
                    </li>
                  </ul>

        <li><a href="#">Account</a>
            <ul>
                <li><a href="SignUp.php">Sign up</a></li>
                <li><a href="SignIn.php">Sign in</a></li>
            </ul>
        </ul>
    </div>

    <a href="ShoppingCart.php"><img src="../Media/cart_logo.png" alt="Shopping Cart" width="50px" height="50px"
            style="float:right"></a>

</nav>
<!----------Product Cards---------->
                <h1 class="ProductTitle">Meat</h1>
                <div class=" justify-content-md-center row">

                  <?php 
                                $myfile = fopen("../Data/productList.txt", "r") or die("Unable to open file!");
                                // Output one line until end-of-file
                                while(!feof($myfile)) {
                                  $line = fgets($myfile);
                                  if (strlen($line) < 5){
                                      break;
                                  }
                            
                                  $elements = explode(";", $line);
                                  
                                  if (strcmp($elements[3], "Meat") == 0)  {
                                    echo "<div class=\"col-md-auto\">";
                                    echo "<div class=\"coca-cola\">";
                                        echo "<a href=\"product-detail.php?id=$elements[0]\">";
                                            echo "<img src=\"../$elements[1]\" alt= \" $elements[2] \" style=\"width:100% ; max-height:200px;\">";
                                        echo "</a>";
                                        echo "<h1 style=\"margin-top: auto; color:rgb(75, 75, 75);\">$elements[2]</h1>";
                                        echo "<p class=\"price\" style=\"color:rgb(75, 75, 75);\">$elements[6]<br/>($elements[8])</p>";
                                        
                                    echo "</div>";
                                  echo "</div>";


                                  }  

                                }
                                fclose($myfile);
                            ?>
                </div>
 
                <!-- Footer -->
<?php include("footer.php") ?>
</body>
</html> 
            
  
