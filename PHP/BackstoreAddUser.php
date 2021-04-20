
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="../Styles/BackstoreStyle.css"/>
    <script type="text/javascript" src="../Javascript/userAdd.js"></script>
    

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
                    
                    <h2 style="font-style: italic;">Add User</h2>
                    <br/>
                    
        <?php
//read the file and find the correct line of data from the checkbox and store the information in an array for display
            $userSelected = $_REQUEST["index"];
            echo "<form name='addForm' id='formOrderEdit' class='orderFrom' action='adduser.php' method='POST'>";

            $myfile = fopen("../Data/users.txt", "r") or die("Unable to open file!");
            $lineNumber = 1;


            while(!feof($myfile)) {
                $line = fgets($myfile); 
     
                $lineArray =  explode(" ", $line);
  

    
        

            }


            $firstName=$lineArray[0];
            $lastName=$lineArray[1];
            $gender=$lineArray[2];
            $postal=$lineArray[3];
            $email=$lineArray[4];
            $password=$lineArray[5];
  
  
  
            fclose($myfile);
    
                ?>
          
                     <?php $userSelected = $_REQUEST["index"];
                    
                    echo" <form id=\"myform\" action=\"addUser.php?index=$userSelected\" method=\"post\">"?>
                       <input type = "submit" value = "Save"  onsubmit=" userAdd() " class="btn btn-primary" style="float:right;"/>
                       <input type = "reset" value = "Cancel" class="btn btn-secondary" style="float:right; margin-right: 5px;"/>
                       <br/>  
                       <!-- text emplacement for the errors of each input-->
                       <p id="correctionFirst"></p>
                        <p id="correctionLast"></p>
                        <p id="correctionPostal"></p>
                        <p id="correctionEmail"></p>
                        <p id="correctionPassword"></p>
                        <p id="correct"></p>

                         <div class="form-row">
                            
                           <div class="form-group col-md-6">
                             <label for="firstName">First Name</label>
                             <input id="firstname" name="firstName"type="text" value="<?php echo $firstName ?>" class="form-control">
                           </div>
                           <div class="form-group col-md-6">
                               <label for="lastName">Last Name</label>
                               <input id="lastname" name="lastName"type="text" value="<?php echo $lastName?>" class="form-control">
                           </div> 


                           <?php
                             echo"<div>";
                             echo"<label for=\"gender\">Gender</label><br/>";
                             echo"<label><input type=\"radio\" name=\"gender\" id=\"female\" style=\"margin: 0 10px 0 2px;\" value=\"Female\"";
                             if(strcmp($gender, "Female") == 0){
                                              echo "checked";
                                       }
                                       echo"/>Female</label>"; 
                                       echo"<label><input type=\"radio\" name=\"gender\" id=\"male\" style=\"margin: 0 10px 0 2px;\" value=\"Male\"";
                                       if(strcmp($gender, "Male") == 0){
                                                        echo "checked";
                                                 }
                                                 echo"/>Male</label>";
                           echo"</div>"; 

                           ?>
                      </div>
 
 
                   <div class="form-row">
                     
                     <div class="form-group col-md-6">
                       <label name="postalCode">Postal Code</label>
                       <input type="text" name="postal" id="postCode" value="<?php echo $postal?>" class="form-control">
                     </div>
                   </div>
 
                   <div class="form-row">
                     
                       <div class="form-group col-md-6">
                         <label name="email">Email</label>
                         <input type="text" name="email" id="emailAddress" value="<?php echo $email?>" class="form-control">
                       </div>
                       
                   </div>
   
                   <div class="form-row">
                     
                       <div class="form-group col-md-6">
                         <label name="password">Password</label>
                         <input type="text" id="password" name="password" value="<?php echo $password?>" class="form-control" placeholder=" Atleast 8 characters">
                       </div>
                       
                   </div>
 
                     </form>  
                    <br/><br/>
        </div>
    </div>

    
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
            <li><a href="Contact Us.html" class="text-muted">Contact us</a></li>
            <li><a class="text-muted">Our story</a></li>
            <li><a class="text-muted">FAQ</a></li>
            </ul>
        </div>
        </div>
    </footer>
    </body>
</html>
