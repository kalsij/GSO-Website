<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    //Bootstrap
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    //Style
    <link rel="stylesheet" type="text/css" href="../Styles/BackstoreStyle.css"/>
    
    //JavaScript
    <script type="text/javascript" src="../Javascript/ProductList.js"></script>
</head>

<body >
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

            <div class="col-sm-8 text-left">       
                <div class="right">
                    <h2 style="font-style: italic;">Product List</h2>
                    
                    <!-- Add Product button -->
                    <input type = "button" value = "Add/Edit Product" onclick=editOrAdd() class="btn btn-primary" style="float:right; margin-right: 5px;"/>

                    <!-- Product List -->
                    <form>
                        
                         <table class="table" id="productTable">
                            <thead id="productHead">
                                <tr>
                                    <th colspan="2">
                                    </th>
                                    <th><p>Product</p></th>
                                    <th><p>Category</p></th>
                                    <th><p>Quantity</p></th>
                                    <th><p>Supplier</p></th>
                                    <th><p>Price</p></th>
                                    <th></td>
                                </tr>
                            </thead>
                            
                            <?php 
                                $myfile = fopen("../Data/productList.txt", "r") or die("Unable to open file!");
                                // Output one line until end-of-file
                                while(!feof($myfile)) {
                                    $line = fgets($myfile);
                                    if (strlen($line) < 5){
                                        break;
                                    }
                            
                                    $elements = explode(";", $line);
                                    //echo $line;  
                                    echo "<tr>";

                                    echo "<td><input type=\"checkbox\"/></td>";
                                    echo "<td><img alt= \" $elements[2] \"src=\"../$elements[1]\" width=\"90\" height=\"75\"></td>";
                                    echo "<td>$elements[2]</td>";
                                    echo "<td>$elements[3]</td>";
                                    echo "<td>$elements[4]</td>";
                                    echo "<td>$elements[5]</td>";
                                    echo "<td>$elements[6]</td>";

                                    echo "</tr>";
                                }
                                fclose($myfile);
                            ?>

                        </table>
                
                        <!-- Delete button -->
                        <input type = "button" value = "Delete" onclick=deleteElement() class="btn btn-primary" style="float:right; margin-right: 5px;"/>

                        
                    </form>  
        </div>
    </div>

<br/><br/><br/><br/>

<!-- Footer -->
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

