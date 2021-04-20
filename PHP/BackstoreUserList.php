<!DOCTYPE html>
<html lang="en">

<head>
    <title>User List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="../Styles/BackstoreStyle.css"/>
    <script type="text/javascript" src="/Javascript/ChooseUser.js"></script>

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


            <div class="col-sm-8 text-left">       
                <div class="right">
                    <h2 style="font-style: italic;">User List</h2>
                    
                    <!-- Add Product button -->
                    <a href="BackstoreAddUser.php" class="btn btn-primary" style="float: right;margin-bottom: 5px;">Add user</a>
                    <input type = "button" value = "Edit " onclick=edit() class="btn btn-primary" style="float:right; margin-right: 5px;"/>
                     <br>
                     <br>
                    <!-- Order List -->
                    <?php function newRow($firstName, $lastName, $gender, $postalCode, $email, $password)
                    {
                        return
                            "<tr>
                            <td><input name = 'checkbox' value = '$firstName' type='radio'></td>             
                            <td>" . $firstName . "</td>
                            <td>" . $lastName . "</td>
                            <td>" . $gender . "</td>
                            <td>" . $postalCode . "</td>
                            <td>" . $email . "</td>
                            <td>" . $password . "</td>
                            </tr>";
                    }
                    ?>
                        
                        <?php
                    echo "
                    <form method = 'POST' action='deleteUser.php'>
                    <table class=\"table\" id=\"UserTable\">
                            <thead id=\"UserHead\">
                                <tr>
                                <th id=firstName><p>Checkboxes</p></th>
                                <th id=firstName><p>First Name</p></th>
                                <th id=lastName><p>Last Name</p></th>
                                <th id=gender><p>Gender</p></th>
                                <th id=postalCode><p>Postal Code</p></th>
                                <th id=Email><p>Email</p></th>
                                <th id=password><p>Password</p></th>
                                    </tr> </thead>";
                    $file = fopen("../Data/users.txt", "r");
                    if ($file) {
                        while (($line = fgets($file)) !== false) {
                            $array = explode(" ", $line);
                            echo newRow($array[0], $array[1], $array[2], $array[3], $array[4],$array[5]);
                        }
                    } else {
                        echo "The file doesnt Exist";
                    }
                    echo "</table>
                    <button class='btn btn-primary' type='submit' value='1' name = 'DeleteUser' onclick='deleteUser()'>Delete</button>
                    <script type='text/javascript' src='Javascript/userlist.js'></script>
                    </form>"
               
                    ?>
                    <!-- Footer -->
<?php include("footer.php") ?>
        </div>
    </div>
</body>
</html> 
