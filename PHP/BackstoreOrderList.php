<!DOCTYPE html>
<html lang="en">

<head>
    <title>Order List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="../Styles/BackstoreStyle.css"/>

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
            <p><a href="BackstoreOrderList.php"></a>Order List</p>
            <p> <a href="BackstoreUserList.php">User List</a></p>
            <p style="font-weight:bold;"><a href="GroceryStore-1.php">Log Out</a></p>
            </div>


            <div class="col-sm-8 text-left">       
                <div class="right">
                    <h2 style="font-style: italic;">Order List</h2>
                    
                    <!-- Add Product button -->
                    <a href="BackstoreAddOrderProfile.php" class="btn btn-primary" style="float: right;margin-bottom: 5px;">Add Order</a>
                    <td><input type = 'button' value = "Edit Order Here" onclick = 'edit()' class = "btn btn-primary" style = "float:right; margin-right: 10px;"/> </td>
            
                    <!-- Order List -->
                    <?php function newRow($ordername, $date, $name, $total, $income)
                    {
                        return
                            "<tr>
                            <td><input name = 'checkbox' value = '$ordername' type='radio'></td>             
                            <td>" . $ordername . "</td>
                            <td>" . $date . "</td>
                            <td>" . $name . "</td>
                            <td>" . $total . "</td>
                            <td>" . $income . "</td>
                           
                            </tr>";
                    }
                    ?>
                        
                        <?php
                    echo "
                    <form method = 'POST' action='deleteOrders.php'>
                    <table class=\"table\" id=\"OrderTable\">
                            <thead id=\"OrderHead\">
                                <tr>
                                <th id=Order><p>Checkboxes</p></th>
                                <th id=Order><p>Order #</p></th>
                                <th id=Date><p>Purchased on</p></th>
                                <th id=name><p>Bill to name</p></th>
                                <th id=Subtotal><p>Subtotal</p></th>
                                <th id=Income><p>Income</p></th>
                                    </tr> </thead>";
                    $file = fopen("../Data/orders.txt", "r");
                    if ($file) {
                        while (($line = fgets($file)) !== false) {
                            $array = explode("\t", $line);
                            echo newRow($array[0], $array[1], $array[2], $array[4], $array[5],$array[7]);
                        }
                    } else {
                        echo "The file doesnt Exist";
                    }
                    echo "</table>
                    <button class='btn btn-primary' type='submit' value='1' name = 'DeleteOrder'>Delete</button>
                    <script type='text/javascript' src='../Javascript/OrderList.js'></script>
                    </form>"
               
                    ?>
                    <!-- Footer -->
<?php include("footer.php") ?>
        </div>
    </div>
</body>
</html> 
