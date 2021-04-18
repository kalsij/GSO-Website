<!--Retrieve data from items -->
<?php
    //click ctrl shift I to see the print text in the Elements section of the body
    session_start();
    // session_unset();
    // echo"elements in the session: \n";
    // print_r($_SESSION);
?>
    

<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Shopping Cart</title>
    <meta chartset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="../Styles/newStyle.css"/>
    <!-- Javascript -->
    <script type="text/javaScript" src="../Javascript/shoppingCart.js" async></script>

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
                     
                        <li><a href="Fruits and vegetables.html">Fruits and Vegetables</a></li>
                        <li><a href="Meat.html">Meat</a></li>
                        <li><a href="Dairy.html">Dairy</a></li>
                        <li><a href="Bread.html">Bread</a></li>
                
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

        <a href="ShoppingCart.html"><img src="../Media/cart_logo.png" alt="Shopping Cart" width="50px" height="50px"
                style="float:right"></a>
    </nav>

    <h1 class="ShoppingCartTitle">My Shopping Cart</h1>
    <div class="container-fluid">
        <div class="shoppingCart row">

            <!-- List of items in shopping cart -->
            <div class="Cart col-md-8 ">
                <h3>MY CART</h3>
                <hr></br>
                
                <?php

                    if(array_key_exists('checkoutButton', $_POST)) {
                        checkoutButton1();
                    }
                    function checkoutButton1() {
                        // //read userFile
                        // $handleUserFile = @fopen("../Data/users.txt", "r");
                        // if($handleUserFile){
                        //     while(($buffer = fgets($handleUserFile))!== false) {
                        //         $userLineArray = explode(" ", $buffer);
                        
                        //to change
                        //$userFullName = $_SESSION["userFullName"];
                        $userFullName = "nameFromSession";
                        $currentDate = date("Y-m-d");
                        $orderNumber = "#".date(m).date(d).date(h).date(i).date(s);
                        //to change
                        // $income = round(0.3*$_SESSION["finalPrice"],2);
                        $income = "incomeFromPOST";
                        
                        // write to file
                        $orderFile = fopen("../Data/ordersListClients.txt", "a");
                        $outputOrder = $orderNumber."\t".$currentDate."\t".$userFullName."\t $".$_SESSION["finalPrice"]."\t $".$income;
                        fputs($orderFile, $outputOrder);
                        fputs($orderFile, "\r\n");
                        fclose($orderFile);
                    }

                    $_SESSION["quantity"] = $_POST["quantity"];

                    // write to file
                    $sessionFile = fopen("../Data/productOrder.txt", "a");
                    fputs($sessionFile, session_encode());
                    fputs($sessionFile, "\r\n");
                    fclose($sessionFile);

                    //read file
                    $handle = @fopen("../Data/productOrder.txt", "r");
                    if($handle){
                        while(($buffer = fgets($handle))!== false) {
                            $lineContentsArray = explode(";", $buffer);
                            
                            //product Qty
                            $product = explode(":", $lineContentsArray[0]);
                            $productQty = str_replace("\"", "", $product[2]);
                            $totalQty=$totalQty + $productQty;
                            // echo "reading the product name: ".$productQty;

                            //product Name
                            $product = explode(":", $lineContentsArray[1]);
                            $productName = str_replace("\"", "", $product[2]);
                            // echo "reading the product name: ".$productName;

                            //product Image
                            $product = explode(":", $lineContentsArray[2]);
                            $productImg = str_replace("\"", "", $product[2]);
                            // echo "reading the product img: ".$productImg;

                            //product Price
                            $product = explode(":", $lineContentsArray[3]);
                            $productPrice = str_replace("\"", "", $product[2]);
                            $subTotalPrice = $subTotalPrice + ($productQty*$productPrice);
                            // echo "reading the product price: ".$productPrice;

                            //product Unit
                            $product = explode(":", $lineContentsArray[4]);
                            $productUnit = str_replace("\"", "", $product[2]);
                            // echo "reading the product unit: ".$productUnit; 
                            
                            echo("
                                <div class='listMyCart justify-content-between align-items-center  row'>
                                    <div class='col-md-4'><img src=$productImg alt='lemon' style='width: 105px;'></div>

                                    <div class='col-md-3'><h6>$productName</br>$productUnit</h6></div>

                                    <!-- Button to change the quantity of the item -->
                                    <div class='col-md-2'>
                                        <div class='qtyItems'>
                                            <button class='incrementButton' type='button'>+</button>
                                            <span class='quantityProduct'>$productQty</span> 
                                            <button class='decrementButton' type='button'>-</button>
                                        </div>
                                    </div>

                                    <div class='priceItem col-md-2 '><h6>$productPrice</h6></div>

                                    <!-- Button to delete the item -->
                                    <div class='col-md-1'>
                                        <div class='delete-trash'>
                                            <button type='button'><img src='../Media/TrashCan(Flaticon).png' alt='trash can' style='height:25px; width: 25px;'></button>
                                        </div>
                                    </div>
                            
                                </div>
                                </br></br>
                            ");
                        }
                        if(!feof($handle)){
                            echo "read error\n";
                        }
                        fclose($handle);
                        $GSTTax = round($subTotalPrice*0.05,2);
                        $QSTTax = round($subTotalPrice*0.09975,2);
                        $finalTotal = round($subTotalPrice+$GSTTax+$QSTTax, 2); 
                        // $_SESSION["finalPrice"] = $finalTotal;
                    }
                    
                 echo("</br></br>
                
            </div>
            
            <!-- Summary of the items (number of items, subtotal, QST, GST and total)-->
<div class='summaryItems col-md-4' style='left: 10px;'>
                <div class='listSummary'>

                    <h3>SUMMARY LIST</h3>
                    <hr></br>

                    <div class='justify-content-between row'>
                        <div class='col-md-auto'>Qty of Items</div>
                        <div class='totalItems col-md-auto' >$totalQty</div>
                    </div>
                    <hr></br>

                    <div class='justify-content-between row'>
                        <div class='col-md-auto'>Subtotal</div>
                        <div class='subtotalPrice col-md-auto'>$ $subTotalPrice </div>
                    </div>
                    <hr></br>

                    <div class='justify-content-between row'>
                        <div class='col-md-auto'>GST</div>
                        <div class='GSTPrice col-md-auto'>$ $GSTTax</div>
                    </div>

                    <div class='justify-content-between row'>
                        <div class='col-md-auto'>QST</div>
                        <div class='QSTPrice col-md-auto'>$ $QSTTax</div>
                    </div>
                    <hr></br>

                    <div class='justify-content-between row'>
                        <div class='col-md-auto'>Total</div>
                        <div class='totalPrice col-md-auto'>$ $finalTotal</div>
                    </div>
                    </br><hr>

                    <!-- Button to continue shopping -->
                    <div class='justify-content-center row'>
                        <div class='continue'>

                            <button type='button' onclick='checkout()'>CONTINUE SHOPPING</button>
                            <hr>

                            <form method='post'>
                                <input type='submit' name='checkoutButton' class='checkout' value='CHECK OUT' />  
                            </form>


                            <a href='../CheckOut.html'><button type='button' class='checkout'>CHECK OUT</button></a>
                            
                            </script>
                            <hr>
                            
                        </div>
                    </div>

                    <div class='justify-content-center row'>
                        <div class='donate'>
                            <a href='https://www.canadahelps.org/en/donate-to-coronavirus-outbreak-response/'
                            target='_blank'><button type='button'>DONATION  |  HELP US </br>FIGHT AGAINST COVID-19</button></a>    
                        </div>
                    </div></br>

                </div>   
            </div>");

            ?>
        </div>
    </div>
<!--                          <a href='CheckOut.html' class='checkOutButton' ><button type='button'>CHECK OUT</button></a>
 -->
     <!---------footer----------->
     <footer class="container py-4">
        <div class="row">
            <div class="col-12 col-md">
                <small class="d-block mb-3 text-muted">&copy; 2021-2022 </br> </small>
            <ul class="list-unstyled text-small">
                <li><a href="BackstoreProductList.html"class="text-muted">Backstore</a></li></ul>
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
