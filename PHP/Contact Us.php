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
        <!--title-->
        <h1 class="ProductTitle">Contact Us</h1>
        <div class="container shadow-lg " >
            <h1>Have some questions? <br/> Please fill out the information below:</h1>
            
            <!--information-->
            <form action = "Contact.php" method = "POST" onsubmit= "return checked()" >
            <div class="form-column">
              <div class=" justify-content-md-center">
                <div class="form-group contactuspage">
                    <p class = "formnames">User Name:</p>
                  <input style="background-color:white" name ="username" id ="username" type="text" class="form-control" placeholder='User Name' >
                </div>
                <div class="form-group contactuspage">
                  <p class = "formnames">Item Name:</p>
                    <input style="background-color:white" type="text" class="form-control" placeholder='Item Name' >
                </div>
                <div class="form-group contactuspage">
                  <p class = "formnames">Order Number</p>
                    <input style="background-color:white" name="ordernumber" id="ordernumber" type="text" class="form-control" placeholder = "Order Number">
                    <div class="form-group">
                      <p class = "formnames">Questions:</p>
                    <textarea class="form-control" rows="5" spellcheck="false"></textarea>
                </div>
</br>
                <button class="btn btn-outline-primary" name = "submit" type = "submit" value = "1" >Submit</button>
             </div>
            </div>
            </form>
          </div>
          </div>

              <!--footer--> 
              <?php include("footer.php") ?>
        </body>
    
    </html>
    
