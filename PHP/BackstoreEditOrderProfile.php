<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Order Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <!-- //Style -->
    <link rel="stylesheet" type="text/css" href="../Styles/BackstoreStyle.css"/>
    <!-- JS -->
    <script type = "text/javascript" src="../Javascript/EditOrderProfile.js"></script>
</head>

<body>
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top" style="background-color: blue; position:fixed;">
        <h1 style="margin-top:0mm;color:white; font-size:50px;font-style:italic; font-weight:bold; margin-right:1cm;">
            GSO</h1>
    </nav>
 
    <div class="container-fluid text-center">  
        <div class="row content">
            
           <!-- Side Bar -->
           <div class="col-sm-2 sidenav">
                <br/>
                <p><a href="GroceryStore-1.php">Grocery Store</a></p>
                <p><a href="BackstoreProductList.php">Product List</a></p>
                <p><a href="BackstoreOrderList.php">Order List</a></p>
                <p> <a href="BackstoreUserList.php">User List</a></p>
                <p style="font-weight:bold;"><a href="GroceryStore-1.php">Log Out</a></p>
            </div>

            <!-- Edit Order -->
            <div class="col-sm-8 text-left">  
                <div class="right">
                    <h2 style="font-style: italic;">Edit Order</h2>
                    <!-- to be changed Alice -->
                    <p style="color: gray; border-bottom: 1px solid lightgray;"></p>
                    
                    <div id="missingInfo"></div>
                    
                    <?php
                      $orderSelected = $_REQUEST["index"];
                      echo "<form id=\"myform\" action=\"backstoreOrderSave.php?index=$orderSelected\" method=\"post\" onsubmit=\" return checkEditOrderFields()\">";
                      $myfile = fopen("../Data/orders.txt", "r") or die("Unable to open orders file to read. Bye-bye!");
                      $orderInfo = array();
                      $lineNumber = 1;

                      while(!feof($myfile)) {
                          $line = fgets($myfile);  
                          $lineArray = explode("\t", $line);

                           if ($orderSelected == $lineNumber){
                            // echo"found line is: $lineNumber";
                            break; 
                           }
                            if ($orderSelected == -1 ){
                            echo "<script>alert('Did not select any order#. Please click any radio button to edit the order. Will re-direct back to Order List.');document.location='BackstoreOrderList.php'</script>";
                            break;                                      
                            }
                            $lineNumber++; 
                            $index++;
                    
                      }

                        $orderNumber=$lineArray[0];
                        $orderDate=$lineArray[1];
                        $orderUserFullName=$lineArray[2];
                        $orderEmail=$lineArray[3];
                        $orderSubtotal=substr($lineArray[4], 1);
                        $orderIncome=$lineArray[5];
                        $orderProducts=$lineArray[6];
                        $orderProductsArraytmp = explode("|", $orderProducts);

                        $orderGST = round($orderSubtotal*0.05,2);
                        $orderQST = round($orderSubtotal*0.09975,2);
                        // $orderSubtotal = 10;
                        $taxgst =round($orderSubtotal*0.05,2);
                        $taxqst =round($orderSubtotal*0.09975,2);
                        $orderTotal = $taxgst+$taxqst+$orderSubtotal;
                        //quantity
                        $orderQty = 0;
                        for( $i=0; $i<count($orderProductsArraytmp);$i++){
                            $orderProductsArray = explode("-", $orderProductsArraytmp[$i]);
                            $orderQty = $orderQty+$orderProductsArray[0];
                        }

                      fclose($myfile);
                     
                      $theDate = date("Y-m-d");
                       
                    ?>
    
                        <!-- Button to save/cancel the edits -->
                        
                        <input type = "submit" value = "Save" name="savingOrder" class="btn btn-primary" style="float: right;"/>
                        <input type = "button" value = "Cancel" onclick="resetEditOrder()" id="formOrderEdit" class="btn btn-secondary" style="float: right; margin-right: 5px;"/>
                        
                        <br/><br/><br/>

                        <label for="start">Order#</label>
                        <input type="text" name="orderNumber" placeholder="orderNumber" value=<?php echo $orderNumber ?>>
                        <hr>
                        <label for="start">Date</label>
                        <input type="date" name="orderDate" value=<?php echo $theDate ?>>
                        <hr>

                        <!-- Add/Edit the client's information -->
                        <h5>Customer Contact</h5>
                        <div class="form-row">                    
                            <div class="form-group col-md-6">
                                <label for="firstName">Bill to Name</label>
                                <input type="text" id="fullName" name="fullName" class="form-control" placeholder="Full Name" value="<?php echo $orderUserFullName; ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="emailAddress">Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="gso@example.ca" value=<?php echo $orderEmail; ?>  >
                            </div>
                            <div class="form-row">            
                                <label for="products">Products (quantity-product|quantity-product)</label>
                                <input type="text" class="form-control" name="orderProducts" id="orderProducts" placeholder="1-banana|5-chicken" value="<?php echo $orderProducts; ?>"/>
                            </div>
                        </div>

                            
                        </div><br/>

                        <!-- Summary of the order -->
                        <div class="summaryOrder">
                            </br>
                            <h5>Summary</h5>
                            <hr></br>
                            <div class="justify-content-between row">
                                <div class="col-md-6">
                                    Qty of Items
                                </div>
                                <div class="col-md-6 input-group">
                                    <label class="sr-only" for="Quantity">Quantity</label>
                                    <input type="text" class="form-control" name="qtyItemsSummary" id="qtyItemsSummary" placeholder=&#35; value="<?php echo $orderQty?>" />
                                    <!-- <input type="hidden" class="form-control" name="orderProducts" id="orderProducts" placeholder=&#35; value="" /> -->
                                </div>
                            </div>
                            </br>

                            <div class="justify-content-between row">
                                <div class="col-md-6">
                                    Subtotal
                                </div>
                                <div class="col-md-6 input-group">
                                    <label class="sr-only" for="Subtotal">Subtotal</label>
                                    <input type="text" class="form-control" name="SubtotalSummary" id="SubtotalSummary" placeholder=&#36; value="$<?php echo $orderSubtotal?>"  />
                                </div>
                            </div>
                            </br>
                            
                            <div class="justify-content-between row">
                                <div class="col-md-6">
                                    GST (5%)
                                </div>
                                <div class="col-md-6 input-group">
                                    <label class="sr-only" for="GST">GST</label>
                                    <input type="text" class="form-control" name="GSTSummary" id="GSTSummary" placeholder=&#36; value="$<?php echo $orderGST ?>"  />
                                </div>
                            </div>
                            </br>

                            <div class="justify-content-between row">
                                <div class="col-md-6">
                                    QST (9.975%)
                                </div>
                                <div class="col-md-6 input-group">
                                    <label class="sr-only" for="QST">QST</label>
                                    <input type="text" class="form-control" name="QSTSummary" id="QSTSummary" placeholder=&#36; value="$<?php echo $orderQST ?>"  />
                                </div>
                            </div>
                            </br>

                            <div class="justify-content-between row">
                                <div class="col-md-6">
                                    Total
                                </div>
                                <div class="col-md-6 input-group">
                                    <label class="sr-only" for="Total">Total</label>
                                    <input type="text" class="form-control" name="TotalSummary" id="TotalSummary" value="$<?php echo $orderTotal ?>" placeholder=&#36; />
                                </div>
                            </div>
                            </br>

                        </div>
                        </br>

                        <div class="form-row">            
                            <label for="income">Income</label>
                            <input type="text" class="form-control" name="income" id="income" value=<?php echo $orderIncome ?> placeholder="&#36;" />
                        </div></br> 

                        <div class="form-group">
                            <label>Extra Order Note:</label>
                            <textarea class="form-control" name ="ExtraNoteOrder" name="extraOrderNote" id="extraOrderNote" rows = "5"></textarea>
                        </div></br>

                    <?php echo "</form>" ?>

                </div>
            </div>

        </div>
    </div>     

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
