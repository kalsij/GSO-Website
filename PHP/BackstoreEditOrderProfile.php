<!-- ask Jasmit to add in BackstoreOrderList.php: line 48 the link to edit page add .php at end -->
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
                    <p style="color: gray; border-bottom: 1px solid lightgray;">Edit Order &#8725; Order &#35; <?php echo $orderNumber ?></p>
                    
                    <div id="missingInfo"></div>
                    
                    <?php

                      $orderSelected = $_REQUEST["index"];
                      //added name - but can nbe removed Alice
                      echo "<form name='editForm' id='formOrderEdit' class='orderFrom' action='edit.php?index=$orderSelected' method='POST'>";

                      $myfile = fopen("../Data/orders.txt", "r") or die("Unable to open file!");
                      $orderInfo = array();
                      $lineNumber = 1;
                      echo"THe order is: $orderSelected";
                      while(!feof($myfile)) {
                          $line = fgets($myfile);  
                          $lineArray = explode("\t", $line);

                           if ($orderSelected == $lineNumber){
                            echo"found line is: $lineNumber";
                            break; 
                           }
                          if ($orderSelected == -1 ){
                            echo "<script>alert('Did not select any order#. Please click any radio button to edit the order. Will re-direct back to Order List.');document.location='BackstoreOrderList.php'</script>";
                            break;    
                            $lineNumber++;  
                                                                      
                        }
                    
                      }
                      echo"the line info: \n";
                      print_r($lineArray);

                      $orderNumber=$lineArray[0];
                        $orderDate=$lineArray[1];
                        $orderUserFullName=$lineArray[2];
                        $orderEmail=$lineArray[3];
                        $orderSubtotal=$lineArray[4];
                        $orderIncome=$lineArray[5];
                        $orderProducts=$lineArray[6];
                        echo $orderProducts;
                        $orderProductsArraytmp = explode("|", $orderProducts);
                        print_r($orderProductsArraytmp);

                        foreach($orderProductsArraytmp as$key=> $value){
                            // echo($value);
                            $orderProductsArray= $orderProductsArray.explode("-", $value);
                            // $orderProductsArraytmp = $orderProductsArray.$orderProductsArraytmp2;
                        }

                        echo"The PRODUCTS SELECTED BY USER ARE: \n";
                        print_r($orderProductsArray);
                      fclose($myfile);
                     
               
                    ?>

                    <!-- <form action="" id="formOrderEdit"> -->
                        <!-- Button to save/cancel the edits -->
                        <input type = "button" value = "Save" onclick="checkEditOrderFields()" class="btn btn-primary" style="float: right;"/>
                        <input type = "reset" value = "Cancel" onclick="resetEditOrder()" class="btn btn-secondary" style="float: right; margin-right: 5px;"/>
                        <br/><br/><br/>

                        <label for="start">Date</label>
                        <input type="date" name="order purchase date" value=<?php echo $theDate = date("Y-m-d"); ?>>
                        <hr>

                        <!-- Add/Edit the client's information -->
                        <h5>Customer Contact</h5>

                        <div class="form-row">                    
                            <div class="form-group col-md-6">
                                <label for="firstName">Bill to Name</label>
                                <input type="text" id="firstName" class="form-control" placeholder="First Name" value=<?php echo $orderUserFullName; ?>>
                            </div>

                            <div class="form-group col-md-6">
                            <label for="emailAddress">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="gso@example.ca" value=<?php echo $orderEmail; ?>  >

                            </div>
                        </div><br/>
                        
                        <!-- <h5>Shipping Address</h5>

                        <div class="form-row">            
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="Address"/>
                        </div></br>    

                        <div class="form-row">                    
                            <div class="form-group col-md-6">
                                <label for="postalCode">Postal Code</label>
                                <input type="text" class="form-control" id="postalCode" placeholder="Postal Code"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" placeholder="City"/>
                            </div>
                        </div></br> -->

                        <!-- Add/Edit the produce(s) of the customer's order -->
<!-- 
                        <h5>Product(s)</h5>
                        <div class="table-responsive-md">
                            <table class="table" id="tableItem0">

                                <thead>
                                    <tr>
                                        <th><p>Product</p></th>
                                        <th><p>Name/Details</p></th>
                                        <th><p>Quantity</p></th>
                                        <th><p>Price(&#36;)&#8725;Unit</p></th>
                                        <th><p>Total.Amount(&#36;)</p></th>
                                        <th><p></p></th>
                                    </tr>
                                </thead> -->

                                <!-- <tr>
                                    
                                    <td>
                                        <img alt="product" src="Media/groceries.png" style="width: 45px; height: 40px;">
                                    </td>

                                    <td>
                                        <div class="input-group">
                                            <label class="sr-only" for="ProductName">Product Name</label>
                                            <input type="text" id="productName" class="form-control form-control-sm productName" placeholder="product"/>
                                        </div>      
                                    </td>

                                    <td>
                                        <div class="input-group">
                                            <label class="sr-only" for="Quantity">Quantity</label>
                                            <input type="text" id="quantity" class="form-control form-control-sm quantity" placeholder=&#35; />
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <div class="input-group">
                                            <label class="sr-only" for="PriceUnit">PriceUnit</label>
                                            <input type="text" id="priceUnit" class="form-control form-control-sm priceUnit" placeholder="&#36"/>
                                        </div> 

                                    <td>
                                        <div class="input-group">
                                            <label class="sr-only" for="Total">Total</label>
                                            <input type="text" id="total" class="form-control form-control-sm total" placeholder=&#36; />
                                        </div>
                                    </td>

                                    // Delete an item in client's order 
                                    <td style="margin-left: 0px; padding-left: 0px;"><button type="button" onclick=deleteItem(this) class="btn btn-danger"><img src="Media/TrashCan(Flaticon).png" alt="trash can" style="height:15px; width:14px;"></button></td>
                                    
                                </tr>
                               
                            </table>

                             //Add an item in client's order 
                            <button type="button" onclick=addItem() class="btn btn-primary">Add</button>
                            </br></br>
                        </div> -->
                    

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
                                    <input type="text" class="form-control" id="qtyItemsSummary" placeholder=&#35; />
                                </div>
                            </div>
                            </br>

                            <div class="justify-content-between row">
                                <div class="col-md-6">
                                    Subtotal
                                </div>
                                <div class="col-md-6 input-group">
                                    <label class="sr-only" for="Subtotal">Subtotal</label>
                                    <input type="text" class="form-control" id="SubtotalSummary" placeholder=&#36; value=<?php echo $orderSubtotal?>  >
                                </div>
                            </div>
                            </br>
                            
                            <div class="justify-content-between row">
                                <div class="col-md-6">
                                    GST (5%)
                                </div>
                                <div class="col-md-6 input-group">
                                    <label class="sr-only" for="GST">GST</label>
                                    <input type="text" class="form-control" id="GSTSummary" value=<?php echo round($subTotalPrice*0.05,2) ?> placeholder=&#36; />
                                </div>
                            </div>
                            </br>

                            <div class="justify-content-between row">
                                <div class="col-md-6">
                                    QST (9.975%)
                                </div>
                                <div class="col-md-6 input-group">
                                    <label class="sr-only" for="QST">QST</label>
                                    <input type="text" class="form-control" id="QSTSummary" value=<?php echo round($subTotalPrice*0.09975,2)?> placeholder=&#36; />
                                </div>
                            </div>
                            </br>

                            <div class="justify-content-between row">
                                <div class="col-md-6">
                                    Total
                                </div>
                                <div class="col-md-6 input-group">
                                    <label class="sr-only" for="Total">Total</label>
                                    <input type="text" class="form-control" id="TotalSummary" value=<?php echo round( round($subTotalPrice*0.09975,2)+round($subTotalPrice*0.05,2), 2 ) ?> placeholder=&#36; />
                                </div>
                            </div>
                            </br>

                        </div>
                        </br>

                        <div class="form-row">            
                            <label for="income">Income</label>
                            <input type="text" class="form-control" id="income" value=<?php echo $orderIncome ?> placeholder="&#36;" />
                        </div></br> 

                        <div class="form-group">
                            <label>Extra Order Note:</label>
                            <textarea class="form-control" name ="ExtraNoteOrder" id="extraOrderNote" rows = "5"></textarea>
                        </div></br>

                    </form> 
                    <!-- the echo open the form name=edit id=formOrderEdit -->

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
