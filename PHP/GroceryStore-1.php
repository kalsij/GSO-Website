<!DOCTYPE html>
<html lang="en">

<head>
  <title>GSO</title>
  ]<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
 <!----------bootstrap---------->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!----------style sheet ---------->
  <script type="text/javaScript" src="../Javascript/script.js"></script>
  <link rel="stylesheet" type="text/css" href="../Styles/newStyle.css" />
</head>

<body>
  
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
$title = "GSO";
?>

<!----------nav bar---------->
  <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top" style="background-color: blue;">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li><a href="GroceryStore-1.php">Home</a></li>

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
                    <?php print $sign1;
                    print $sign2;?>
                </ul>

      
            </ul>
        </ul>
    </div>

    <a href="ShoppingCart.php"><img src="../Media/cart_logo.png" alt="Shopping Cart" width="50px" height="50px"
            style="float:right"></a>

</nav>
<!--------------header--------------->
<div class="banner-area">
  <h1 style="margin-top:0mm;color:rgb(107, 104, 104); font-size:80px;font-style:italic; font-weight:bold; margin-right:1cm;">
    GSO</h1>
  <h1 style="margin-top:0mm;color:rgb(107, 104, 104); font-size: 20px;font-style:italic; font-weight:bold; margin-right:1cm;"> Online Grocery Store</h1>
  
</div>
<div class="content-area">
  <div class="wrapper">
  </div>

<!------featured aisles--------->
<h2 class="aisles">Aisles</h2>
<div class=" justify-content-md-center row">
  <div class="col-md-auto">
      <div class="fandv-aisle">
        <a href="Fruits and vegetables.php">        
              <img src="../Media/pexels-mark-stebnicki-2255935.jpg" alt="aisle 1" style="width:100%">
            </a>
      </div>
    </div>
       <div class="col-md-auto">
        <div class="bread-aisle">
          <a href="Bread.php">
              <img src="../Media/pexels-markus-spiske-1871024.jpg" alt="aisle 2" style="width:100%">
            </a>
     </div>
    </div>
     <div class="col-md-auto">
      <div class="meat-aisle">
        <a href="Meat.php">
              <img src="../Media/pexels-matheus-gomes-2491273.jpg" alt="aisle 3" style="width:100%">
            </a>
      </div>
    </div> 
    <div class="col-md-auto">
      <div class="dairy-frontpage">
        <a href="Dairy.php">
              <img src="../Media/pexels-pixabay-248412.jpg" alt="aisle 4" style="width:100%">
            </a>
      </div>
    </div> 
</div>
<!-----etra categories----->

<div class="justify-content-md-center d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">

    <div class="col-lg-auto">
      
        <div class="extra-aisle1 ">
          <a href="pasta.php">        
                <img src="../Media/pexels-klaus-nielsen-6287446.jpg" alt="pasta aisle " style="width:100%">
              </a>
    
      </div>
    </div>
    <div class="col-lg-auto">
      <div class="extra-aisle2">
        <a href="drinks.php">
            <img src="../Media/pexels-breakingpic-3008.jpg" alt="drinks aisle " style="width:100%">
          </a>
   </div>
    </div>
</div>


<!----------weekly deals----------->

<h1 class="aisles">$5.50 Weekly Deals</h1>
                <div class=" justify-content-md-center row">

                  <?php 
                                $myfile = fopen("../Data/productList.txt", "r") or die("Unable to open file!");
                               
                                while(!feof($myfile)) {
                                  $line = fgets($myfile);
                                  if (strlen($line) < 5){
                                      break;
                                  }
                            
                                  $elements = explode(";", $line);
                                  
                                  if (strcmp($elements[6], "5.50$") == 0)  {
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
 
<!-------email subscription-------->
<div class="container shadow-lg pt-4 pb-3 pt-2 mt-4 w-75 text-center border rounded-pill">
  <form class="row">
    <div class="col">
      <label for="email" class="lead">Enter your email to receive notifications on deals!&nbsp
        <input type="email" name="email" id="emailSub" class="col-12 col-md-3">
  <button class="btn btn-outline-warning m-2" onclick="checkSub();">Submit</button>
      </label>
    </div>
  </form>
</div>

<!---------footer----------->
<footer class="container py-4">
  <div class="row">
    <div class="col-12 col-md">
      <small class="d-block mb-3 text-muted">&copy; 2021-2022 </br> </small>
  
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
        <li><a class="text-muted" href="Contact Us.php">Contact us</a></li>
        <li><a class="text-muted">Our story</a></li>
        <li><a class="text-muted">FAQ</a></li>
      </ul>
    </div>
  </div>
</footer>

</body>

</html>

