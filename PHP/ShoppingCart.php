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

    $subTotalPrice = 0;
    $GSTTax = 0;
    $QSTTax =0;
    $totalQty = 0;
    $finalTotal = 0;

    $_SESSION["buttonBase"] =10;
    $_SESSION["buttonIndex"] =1;
    //write to orders file
    if(isset($_POST["checkoutButton"])){
        checkoutButton1();
    }
    $cartElements = $_SESSION["elementsProduct"];
    $cartElements[8] = str_replace("\n", '', $cartElements[8]);
    $cartElements[9] = $_POST["quan"];
    $_SESSION["elementsProduct"] = $cartElements;
    
    function checkoutButton1() {
       
        if(strlen($_SESSION["fullName"]) <2){
            $userFullName = "client NoSignIn";
            $userEmail = "noEmail";
        }
        else {
            $userFullName = $_SESSION["fullName"];
            $userEmail = $_SESSION["signinEmail"];
        }
        
        $currentDate = date("Y-m-d");
        $range = range('A', 'Z');
        $range2 = range('11111', '999999');
        $index = array_rand($range);
        $index2 = array_rand($range);
        $orderNumber = "#".$range2[$index].$range[$index].$range[$index2];
        $income = round(0.3*$_SESSION["cartfinalTotalPrice"],2);

        foreach($_SESSION["cart"] as $index=>$value) {
            $nameProduct = $value[2];
            $qtyProduct = $value[9];
           $qtyProduct = substr($qtyProduct, 0, -2);
            $outputOrderProducts = $outputOrderProducts.$qtyProduct."-".$nameProduct."|";
        }
        $outputOrderProducts = substr($outputOrderProducts, 0, -1);
        
        // write to file
        $orderFile = fopen("../Data/orders.txt", "a");
        $outputOrder = $orderNumber."\t".$currentDate."\t".$userFullName."\t".$userEmail."\t$".$_SESSION["cartfinalTotalPrice"]."\t$".$income."\t".$outputOrderProducts;
        fputs($orderFile, $outputOrder);
        fputs($orderFile, "\r\n");
        fclose($orderFile);

        header("Location: CheckOut.php");die();
        
    }             
    function readingConstructSessionCart() {
    
        $handle = fopen("../Data/cartProducts.txt", "r") or die("Unable to open cartProducts file to read. Bye-bye!");
        $i = 0;
        if($handle){
            while(($line = fgets($handle))!== false) {
                //product Qty
                if( strlen($line ) >3 ){
                $elements = explode(";", $line);
                
                $_SESSION["cart"][$i] = $elements;
                $i=$i+1;
                }
            }
        }
        $countingN = count($_SESSION["cart"]);
        if(!feof($handle)){
            echo "read error\n";
        }
        fclose($handle);
    }

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
                <li><a href="GroceryStore-1.php">Home</a></li>

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


    <h1 class="ShoppingCartTitle">SHOPPING CART</h1>
    <div class="container-fluid">

        <div class="shoppingCart row">

            <!-- List of items in shopping cart -->
            <div class="Cart col-md-8 ">
                <h3>MY CART</h3>
                <hr></br>
                
                <?php
                    
                    $finalTotal = 0;

                    function displayItem(){
                        //display product on shopping cart page
                         foreach($_SESSION["cart"] as $index=>$value) {
                            $imgProduct = "../".$value[1];
                            $nameProduct = $value[2];
                            $priceProduct = $value[6];
                            $unitProduct = $value[8];
                            $qtyProduct = $value[9];
                            $totalQty = $totalQty+$qtyProduct;
                            $subTotalPrice = $subTotalPrice+($priceProduct*$qtyProduct);
                            $GSTTax = round($subTotalPrice*0.05,2);
                            $QSTTax = round($subTotalPrice*0.09975,2);
                            $finalTotal = round($subTotalPrice+$GSTTax+$QSTTax, 2); 
                            $_SESSION["cartfinalTotalPrice"] = $finalTotal;
                            $_SESSION["buttonIndex"] = $_SESSION["buttonBase"] + 1;
                          
                            ?>
                    
                         <form method="post" action="updateSC.php?index="+clicked_id>
                        

                        <div class="listMyCart justify-content-between align-items-center  row">
                            <div class="col-md-4"><img src=<?php echo $imgProduct?> alt=<?php echo $nameProduct?> style="width: 105px;"></div>

                            <div class="col-md-3"><h6><?php echo $nameProduct?></br><?php echo $unitProduct?></h6></div>

                            <!-- Button to change the quantity of the item -->
                            <div class="col-md-2">
                                <div class="qtyItems">
                                <input type="button" id="<?php  echo $_SESSION["buttonIndex"] ?>" type="submit" name="incrementButton" class="incrementButton" onClick="reply_click(this.id)" value="+" style="border: none; outline: 0; color: white; background-color: rgb(219, 11, 11); cursor: pointer; width: 100%;"> 
                                    <span class="quantityProduct"><?php echo $qtyProduct?></span> 
                                   <?php $_SESSION["buttonIndex"]=$_SESSION["buttonIndex"]+1;  ?>
                                    <input type="button" id="<?php  echo $_SESSION["buttonIndex"] ?>" type="submit" name="decrementButton" class="decrementButton" onClick="reply_click(this.id)" value="-"  style="border: none; outline: 0; color: white; background-color: rgb(219, 11, 11); cursor: pointer; width: 100%;" >
                                </div>
                            </div>

                            <div class="priceItem col-md-2 "><h6><?php echo $priceProduct?></h6></div>

                            <?php $_SESSION["buttonIndex"]=$_SESSION["buttonIndex"]+1; ?>

                            <!-- Button to delete the item -->
                            <div class="col-md-1">
                                <div class="delete-trash">
                                <input type="button" id="<?php  echo $_SESSION["buttonIndex"] ?>" type="submit" name="deleteButton" class="deleteButton" onClick="reply_click(this.id)" value="DEL" class="btn btn-danger" >
                                </div>
                            </div>
                            </br></br>

                            <script type="text/javascript">
                                function reply_click(clicked_id)
                                {
                                    // alert("hello");
                                    window.location.replace("updateSC.php?index="+clicked_id);
                                }
                            </script>

                        </div></br></br>
                        </form>
                        <?php
                        $_SESSION["buttonBase"] = $_SESSION["buttonBase"] + 10;

                        }
                    }

                    // write to cartProducts file 
                    if( isset($_POST["quan"])  && isset($_SESSION["elementsProduct"])  ){

                        $sessionFile = fopen("../Data/cartProducts.txt", "a") or die("Unable to open cartProducts file to write. Bye-bye!");
                        for($i = 0; $i <10; $i++){
                            $toPrintProduct = $toPrintProduct.$_SESSION["elementsProduct"][$i].";";
                        }
                        $toPrintProduct = substr($toPrintProduct, 0, -1);
                        
                        fputs($sessionFile, $toPrintProduct);
                        fputs($sessionFile, "\r\n");
                        fclose($sessionFile);
                    }
                   
                    ?>
                    </br></br>
                    <?php
                    //read from cartProducts file
                        readingConstructSessionCart();
                        displayItem();
                    ?>
            </div>
            
            <!-- Summary of the items (number of items, subtotal, QST, GST and total)-->
            <div class='summaryItems col-md-4' style='left: 10px;'>
                <div class='listSummary'>

                    <h3>SUMMARY LIST</h3>
                    <hr></br>

                    <?php
                        foreach($_SESSION["cart"] as $index=>$value) {
                            $imgProduct = "../".$value[1];
                            $nameProduct = $value[2];
                            $priceProduct = $value[6];
                            $unitProduct = $value[8];
                            $qtyProduct = $value[9];
                            $totalQty = $totalQty+$qtyProduct;
                            $subTotalPrice = $subTotalPrice+($priceProduct*$qtyProduct);
                            $GSTTax = round($subTotalPrice*0.05,2);
                            $QSTTax = round($subTotalPrice*0.09975,2);
                            $finalTotal = round($subTotalPrice+$GSTTax+$QSTTax, 2); 
                            $_SESSION["cartfinalTotalPrice"] = $finalTotal;
                        }
                            ?>

                    <div class='justify-content-between row'>
                        <div class='col-md-auto'>Qty of Items</div>
                        <div class='totalItems col-md-auto' ><?php echo $totalQty?></div>
                    </div>
                    <hr></br>

                    <div class='justify-content-between row'>
                        <div class='col-md-auto'>Subtotal</div>
                        <div class='subtotalPrice col-md-auto'>$ <?php echo $subTotalPrice ?></div>
                    </div>
                    <hr></br>

                    <div class='justify-content-between row'>
                        <div class='col-md-auto'>GST</div>
                        <div class='GSTPrice col-md-auto'>$ <?php echo $GSTTax?></div>
                    </div>

                    <div class='justify-content-between row'>
                        <div class='col-md-auto'>QST</div>
                        <div class='QSTPrice col-md-auto'>$ <?php echo $QSTTax?></div>
                    </div>
                    <hr></br>

                    <div class='justify-content-between row'>
                        <div class='col-md-auto'>Total</div>
                        <div class='totalPrice col-md-auto'>$ <?php echo $finalTotal?></div>
                    </div>
                    </br><hr>

                    <!-- Button to continue shopping -->
                    <div class='justify-content-center row'>
                        <div class='continue'>
                            <a href="GroceryStore-1.php"><button type="button">CONTINUE SHOPPING</button></a>
                            <hr>

                            <form method='post'>
                                <div class= checkout>
                                    <input type='submit' name='checkoutButton' onclick="checkoutCS()" class='checkout' value='CHECK OUT' style="border: none; outline: 0; padding: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); color: #ffffff; background-color:black;" />  
                                </div>
                            </form>
                                                    
                            <script>
                                function checkoutCS(){
                                    alert("Checking out! Thank you for your purchase.");
                                    // window.location.replace("CheckOut.php");

                                }
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
            </div>
                    
            
        </div>
    </div>
    <!--footer-->        
    <?php 
include("footer.php");
?>
