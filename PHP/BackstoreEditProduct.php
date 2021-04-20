<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add/Edit Product</title>
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
    //Script
    <script type="text/javascript" src="../Javascript/EditProduct.js"></script>
 

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
                    <h2 style="font-style: italic;">Add/Edit Product</h2>
                    <br/>
                    <p id="correctionInfo"></p>
                
                    <!-- Edit part -->
                    
                    <?php 
                      $par = $_REQUEST["index"];
                      echo "<form id=\"myform\" action=\"editOrAdd.php?index=$par\" method=\"post\" onsubmit=\"return save()\">";
                    
                      $myfile = fopen("../Data/productList.txt", "r") or die("Unable to open file!");
                      $elements = ["", "", "", ""];
                      while(!feof($myfile)) {
                          $line = fgets($myfile);  
                          $lineArray = explode(";", $line);

                          if (strcmp($par, $lineArray[0]) == 0){
                              $elements = $lineArray;
                              break;
                          }
                          $index++;
                      }
                      $id=$elements[0];
                      $image=$elements[1];
                      $title=$elements[2];
                      $category=$elements[3];
                      $quantity=$elements[4];
                      $supplier=$elements[5];
                      $price=$elements[6];
                      $description=$elements[7];
                      $unit=$elements[8];
                      
                      fclose($myfile);



                      echo "<input type = \"button\" value = \"Cancel\" onclick=\"resetForm()\" class=\"btn btn-secondary\" style=\"float:right; margin-right: 5px;\"/>";
                      
                      echo "<input type = \"submit\" value = \"Save\" class=\"btn btn-primary\" id=\"saveInfo\" style=\"float:right; margin-right: 5px;\"/>";
                     
                      echo "<br/>";
                          echo "<div class=\"form-row\" name=\"firstRow\">";
                                echo "<div class=\"form-group col-md-6\" name=\"firstColumn\">";
                                  echo "<label for=\"supplier\">Title</label>";
                                  echo "<input type=\"text\" id=\"title\" value=\"$title\" name=\"title\" class=\"form-control\">";
                                echo "</div>";
                                echo "<div>";
                                  echo "<label for=\"category\">Category</label><br/>";
                                  
                                  echo "<label><input type=\"radio\" id=\"fruits\" name=\"category\" value=\"Fruits & Vegetables\" style=\"margin-left: 10px;\"";  
                                  if ( strcmp($category, "Fruits & Vegetables") == 0 ){
                                    echo "checked";
                                  }
                                  echo "/>Fruits & Vegetables</label>";


                                  echo "<label><input type=\"radio\" id=\"dairy\" name=\"category\" value=\"Dairy\" style=\"margin-left: 30px;\"";
                                  if ( strcmp($category, "Dairy") == 0 ){
                                    echo "checked";
                                  }
                                  echo "/>Dairy</label>";


                                  echo "<label><input type=\"radio\" id=\"meats\" name=\"category\" value=\"Meat\" style=\"margin-left: 30px;\"";
                                  if ( strcmp($category, "Meat") == 0 ){
                                    echo "checked";
                                  }
                                  echo "/>Meat</label>";


                                  echo "<label><input type=\"radio\" id=\"bread\" name=\"category\" value=\"Bread\" style=\"margin-left: 30px;\"";
                                  if ( strcmp($category, "Bread") == 0 ){
                                    echo "checked";
                                  }
                                  echo "/>Bread</label>";


                                  echo "<label><input type=\"radio\" id=\"drinks\" name=\"category\" value=\"Drinks\" style=\"margin-left: 30px;\"";
                                  if ( strcmp($category, "Drinks") == 0 ){
                                    echo "checked";
                                  }
                                  echo "/>Drinks</label>";


                                  echo "<label><input type=\"radio\" id=\"pasta\" name=\"category\" value=\"Pasta\" style=\"margin-left: 30px;\"";
                                  if ( strcmp($category, "Pasta") == 0 ){
                                    echo "checked";
                                  }
                                  echo "/>Pasta</label>";


                                echo "</div>";
                            echo "</div>";
                          echo "</div>";

                          echo "<div class=\"form-row\" >";
                            echo "<div class=\"col-md-6 mb-3\" >";
                              echo "<label for=\"validationDefault03\">Supplier</label>";
                              echo "<input type=\"text\" value=\"$supplier\" name= \"supplier\" id=\"supplier\" class=\"form-control\">";
                            echo "</div>";
                            echo "<div class=\"col-md-6 mb-3\" >";
                              echo "<label for=\"validationDefault03\">Quantity</label>";
                              echo "<input type=\"text\" value=\"$quantity\" name= \"quantity\" id=\"quantity\" class=\"form-control\">";
                            echo "</div>";
                          echo "</div>";

                          echo "<div class=\"form-row\" >";
                            echo "<div class=\"col-md-6 mb-3\" >";
                              echo "<label for=\"validationDefault03\">Price/unit </label>";
                              echo "<input type=\"text\" value=\"$unit\" name= \"unit\" id=\"unit\" class=\"form-control\">";
                            echo "</div>";
                            echo "<div class=\"col-md-6 mb-3\" >";
                              echo "<label for=\"validationDefault03\">Price</label>";
                              echo "<div class=\"input-group-append\" >";
                                echo "<input type=\"text\" value=\"$price\" name= \"price\" id=\"price\" class=\"form-control\">";
                              echo "</div>";
                            echo "</div>";
                          echo "</div>";

                          echo "<div class=\"form-group\">";
                            echo "<label for=\"formGroupExampleInput\">Description</label>";
                            echo "<input type=\"text\" value=\"$description\" name= \"description\" class=\"form-control\" id=\"formGroupExampleInput\">";
                          echo "</div>";
        
                        echo "<div class=\"form-group\">";
                          echo "<label for=\"exampleFormControlFile1\">Add picture</label>";
                          echo "<input type=\"file\" value=\"$image\" name= \"image\" class=\"form-control-file\" id=\"picture\">"; 
                        echo "</div>"; 
                        
                    echo "</form>";  
                    echo "<br/><br/>";
                    ?>
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
        <li><a class="text-muted" href="Contact Us.php">Contact us</a></li>
        <li><a class="text-muted">Our story</a></li>
        <li><a class="text-muted">FAQ</a></li>
      </ul>
    </div>
  </div>
</footer>

</body>

</html>
