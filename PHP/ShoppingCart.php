<!--Retrieve data from items -->
<?php
    //click ctrl shift I to see the print text in the Elements section of the body
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
    $js_file = "../Javascript/shoppingCart.js"." async";
    $title = "ShoppingCart";
    include("header.php");

    //write to ordersListClients file
    if(isset($_POST["checkoutButton"])){
        checkoutButton1();

    }
    $cartElements = $_SESSION["elementsProduct"];
    $cartElements[8] = str_replace("\n", '', $cartElements[8]);
    $cartElements[9] = $_POST["quantity"];
    $_SESSION["elementsProduct"] = $cartElements;
    
    function checkoutButton1() {
        $userFullName = $_SESSION["fullName"];
        $userEmail = $_SESSION["signinEmail"];
        $currentDate = date("Y-m-d");
        $orderNumber = "#".date(m).date(d).date(h).date(i).date(s);
        //to change
        $income = round(0.3*$_SESSION["cartfinalTotalPrice"],2);
        
        // write to file
        $orderFile = fopen("../Data/ordersListClients.txt", "a");
        $outputOrder = $orderNumber."\t".$currentDate."\t".$userFullName."\t ".$userEmail."\t $".$_SESSION["cartfinalTotalPrice"]."\t $".$income;
        fputs($orderFile, $outputOrder);
        fputs($orderFile, "\r\n");
        fclose($orderFile);
        
    }             
    function readingConstructSessionCart() {
    
        $handle = @fopen("../Data/cartProducts.txt", "r") or die("Unable to open cartProducts file to read. Bye-bye!");
        $i = 0;
        if($handle){
            while(($line = fgets($handle))!== false) {
                //product Qty
                $elements = explode(";", $line);
    
                $_SESSION["cart"][$i] = $elements;
                $i=$i+1;
            }
        }
        $countingN = count($_SESSION["cart"]);
        if(!feof($handle)){
            echo "read error\n";
        }
        fclose($handle);
    }

?>
    <h1 class="ShoppingCartTitle">SHOPPING CART</h1>
    <div class="container-fluid">
        <div class="shoppingCart row">

            <!-- List of items in shopping cart -->
            <div class="Cart col-md-8 ">
                <h3>MY CART</h3>
                <hr></br>
                
                <?php
                    $finalTotal = 0;

                    // write to cartProducts file 
                    if( isset($_POST["quantity"])  && isset($_SESSION["elementsProduct"])  ){
                        $sessionFile = fopen("../Data/cartProducts.txt", "a") or die("Unable to open cartProducts file to write. Bye-bye!");
                        for($i = 0; $i <10; $i++){
                            $toPrintProduct = $toPrintProduct.$_SESSION["elementsProduct"][$i].";";
                        }
                        $toPrintProduct = substr($toPrintProduct, 0, -1);
                        
                        fputs($sessionFile, $toPrintProduct);
                        fputs($sessionFile, "\r\n");
                        fclose($sessionFile);
                    }

                    //read from cartProducts file
                    readingConstructSessionCart();


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

                        echo("
                        <div class='listMyCart justify-content-between align-items-center  row'>
                            <div class='col-md-4'><img src=$imgProduct alt=$nameProduct style='width: 105px;'></div>

                            <div class='col-md-3'><h6>$nameProduct</br>$unitProduct</h6></div>

                            <!-- Button to change the quantity of the item -->
                            <div class='col-md-2'>
                                <div class='qtyItems'>
                                    <button class='incrementButton' type='button'>+</button>
                                    <span class='quantityProduct'>$qtyProduct</span> 
                                    <button class='decrementButton' type='button'>-</button>
                                </div>
                            </div>

                            <div class='priceItem col-md-2 '><h6>$priceProduct</h6></div>

                            <!-- Button to delete the item -->
                            <div class='col-md-1'>
                                <div class='delete-trash'>
                                    <button type='button'><img src='../Media/TrashCan(Flaticon).png' alt='trash can' style='height:25px; width: 25px;'></button>
                                </div>
                            </div>
                    
                        </div>
                        </br></br>");
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
                            <a href=\"GroceryStore-1.php\"><button type=\"button\">CONTINUE SHOPPING</button></a>
                            <hr>

                            <form method='post'>
                                <input type='submit' name='checkoutButton' class='checkout' value='CHECK OUT' />  
                            </form>
                                                    
                            <script>
                                var checkout = document.getElementsByClassName(\"checkout\")
                                for (var i = 0; i < checkout.length; i++) {
                                    var button = checkout[i]
                                    button.addEventListener('click', function(event) {
                                        var buttonClicked = event.target
                                        console.log(buttonClicked)

                                        alert(\"Checking out! Thank you for your purchase.\");
                                        window.location.replace(\"window.location.href = 'Checkout.php'\");
                                    })
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
            </div>");
                    
            ?>
        </div>
    </div>
    <!--footer-->        
    <?php 
include("footer.php");
?>
