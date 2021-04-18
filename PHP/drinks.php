<!DOCTYPE html>
<html lang="en">

<head>
    <title>Drinks</title>
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
                <li><a href="SignUp.html">Sign up</a></li>
                <li><a href="SignIn.html">Sign in</a></li>
            </ul>
        </ul>
    </div>

    <a href="ShoppingCart.html"><img src="../Media/cart_logo.png" alt="Shopping Cart" width="50px" height="50px"
            style="float:right"></a>

</nav>
<!----------Product Cards---------->
                <h1 class="ProductTitle">Drinks</h1>
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
                                  
                                  if (strcmp($elements[3], "Drinks") == 0)  {
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
                                fclose($myfile);
                            ?>
                </div>

            <!-- Footer -->
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
          <li><a href="Contact Us.html" a class="text-muted">Contact us</a></li>
          <li><a class="text-muted">Our story</a></li>
          <li><a class="text-muted">FAQ</a></li>
        </ul>
      </div>
    </div>
  </footer>
</body>
</html> 
  
  
