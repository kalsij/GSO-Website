<!DOCTYPE html>
<html lang="en">

<head>
    <title>User List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!----bootstrap--->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Javascript/script.js"></script>
    <!----Style--->
    <link rel="stylesheet" type="text/css" href="../Styles/BackstoreStyle.css" />


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
                <br />
                <p><a href="GroceryStore-1.php">Grocery Store</a></p>
                <p><a href="BackstoreProductList.php">Product List</a></p>
                <p><a href="BackstoreOrderList.php">Order List</a></p>
                <p> <a href="BackstoreUserList.php">User List</a></p>
                <p style="font-weight:bold;"><a href="GroceryStore-1.php">Log Out</a></p>
            </div>


            <div class="col-sm-8 text-left">
                <div class="right">
                    <h2 style="font-style: italic;">User List</h2>
<br/>
                   

                    <?php function newRow($firstName, $lastName, $gender, $postalCode, $email, $password)
                    {
                        return
                            "<tr>  
                            <td><input name = 'checkbox' type='radio'></td>                                  
                            <td>" . $firstName . "</td>
                            <td>" . $lastName . "</td>
                            <td>" . $gender . "</td>
                            <td>" . $postalCode . "</td>

                            <td>" . $email . "</td>

                            <td>" . $password . "</td>
                         
                            <td><input type ='button' value = 'Delete' class='btn btn-primary' onclick='deleteUser(this)' style='float:right;'/></td>

                            </tr>";
                    }
                    ?>

                    <!-- User  List -->

                    <?php
                    echo "
                    <form>
                    <table class='table' id='productTable'>
                    <thead id='productHead'>
                                <tr>
                                <th id=Order><p>Checkboxes</p></th>
                                    <th class='tab'>First Name</p></th>
                                    <th>Last Name</p></th>
                                    <th>Gender</p></th>
                                    <th>Postal Code</p></th>
                                    <th>Email</p></th>
                                    <th>Password</p></th> 
                                    
                                    </tr> 
                                    </thead>
                                    </form>
                                    ";

                    $file = fopen("../Data/users.txt", "r");
                    if ($file) {
                        while (($line = fgets($file)) !== false) {
                            $array = explode(" ", $line);
                            echo newRow($array[0], $array[1], $array[2], $array[3], $array[4], $array[5]);
                        }
                    } else {
                        echo "The file doesnt Exist";
                    }
                    echo "</table> 
                    <br/>
                    <a href='BackstoreAddUser.php' class='btn btn-primary' style='float: right;margin-bottom: 5px;'>Add User</a>
                    <a href='BackstoreEditUser.php' class='btn btn-primary' style='float: right;margin-right: 5px;'> Edit</a>
                    
                    <script type='text/javascript' src='../Javascript/script.js'></script>"
                    ?>
                    <br/>
                    <br/>
                    <br/>
                
                    <br/>
                   <!--footer-->
 <?php include("footer.php") ?>
                </div>
                 
            </div>
            
</body>

</html>

