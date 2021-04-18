<?php 
session_start();
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




$js_file = "../Javascript/script.js";
$title = $elements[2];
include("header.php");
?>
        <!--product description sheet-->
        <h1> </h1>
        <div class="container shadow-lg " >
            
            <?php

            $id = $_REQUEST["id"];
                $myfile = fopen("productList.txt", "r") or die("Unable to open file!");
                               
                while(!feof($myfile)) {
                    $line = fgets($myfile);
                    if (strlen($line) < 5){
                        break;
                    }
                            
                    $elements = explode(";", $line);
                    //if the two strings are equal
                    if (strcmp($id, $elements[0]) == 0) {
                        //echo "Id found" . $elements[3];


                        echo "<div class=\"row\">";

             
                        echo "<div class=\"col-md-6 \" >";
                            echo"<img class=\"picture\" src=\"../$elements[1]\" alt= \" $elements[2] \" style=\"width:90%; display: block; margin: 0 auto; margin-bottom: 20px;\">";
                        echo "</div>";
        
                        echo "<div class=\" col-md-5 \" style = \" margin-right: 50px\">";
                            echo "<h4 ><b>$elements[2]</b></h4>";
                                echo "<br/>";
                                
                                echo "<h3  style=\"color:red\">";
                                    echo "CAD 1.74$/unit";
                                echo "</h3>";
                                echo "<p>";
                                    echo "(355 mL)";
                                echo "</p>";
                                echo"<form action = \"ShoppingCart.php\" method = \"post\"> ";
                                echo "<input class = \"product-quantity ml-2 mr-2\" min = \"1\" type = \"number\" name = \"quan\" id= \"quan\" value=\"1\" style= \"width:20%;\">";
                                echo "<button  type=\"button\" onclick=\"incrementCola()\" style=\"visibility:hidden;\">+</button>";
                                 echo "<span id=\"numOfCola\"style=\"visibility:hidden;\">1</span>";   
                                echo "<input type=\"button\" id=\"test\"onclick=\"decrementCola()\ style=\"visibility:hidden;\" style= \"background-color:white; color:white; display:none;\"></input>";
                        
                                echo "<input type=\"hidden\" name=\"pID\" id=\"pID\" value={$elements[0]}>";
                                echo "<div class=\"btn\">";
                                //echo "<button type=\"submit\" onclick=\"addColaToCart()\">Add to cart</button>";
                                echo "<input type= \"submit\"  value=\"Add to cart\" style = \"background-color: black; color : white\">";
                                echo "</div>"; 

                                if(isset($_SESSION[$elements[2]])){
                                    $_SESSION[$elements[2]]="Lemon";
                                $_SESSION[$elements[1]]="../Media/Lemons(daniel_kim_unsplash).jpg";
                                $_SESSION[$elements[5]]="CAD 1.00$";
                                $_SESSION[$elements[8]]="1.00$/EA"; 
                                 }
                                echo"</form>";
                                echo "<br/>";
                                echo "<p id=\"addedCola\"></p>";
                                echo "<p id=\"totalCola\"></p>";
                                echo "<div style=\"padding-top: 20px;\">";
                                    echo "<button class=\"dropbtn\" onclick=\"showColaDescription()\">Product Description</button>";
                                    echo "<p id=\"colaDescription\" style=\"visibility:hidden;\">$elements[7]</p>";
                                echo "</div>";
                                // <!-- JavaScript -->
                                echo "<script type = \"text/javascript\" src=\"../Javascript/script.js\"></script>";
                        echo "</div>";
                    echo "</div>"; 

                    }
                }

                fclose($myfile);

            ?>

        </div>
        

        <!--Display of other products from same aisle-->
        <h1>Other related items</h1>
        <div class=" justify-content-md-center row">
                            <?php 
                                $myfile = fopen("productList.txt", "r") or die("Unable to open file!");
                                // Output one line until end-of-file
                                while(!feof($myfile)) {
                                  $line = fgets($myfile);
                                  if (strlen($line) < 5){
                                      break;
                                  }
                            
                                  $elements = explode(";", $line);
                                  
                                  if (strcmp($elements[3], "Drinks") == 0)  {
                                    echo "<div class=\"col-md-auto\">";
                                    echo "<div class=\"coca-cola\">";
                                        echo "<a href=\"product-detail.php?id=$elements[0]\">";
                                            echo "<img src=\"../$elements[1]\" alt= \" $elements[2] \" style=\"width:100% ; max-height:200px;\">";
                                        echo "</a>";
                                        echo "<h1 style=\"margin-top: auto; color:rgb(75, 75, 75);\">$elements[2]</h1>";
                                        echo "<p class=\"price\" style=\"color:rgb(75, 75, 75);\">$elements[6]<br/>(355 mL)</p>";
                                        echo "<p><button style=\"color:white;\">Add to Cart</button></p>";
                                    echo "</div>";
                                  echo "</div>";


                                  }  

                                }
                                fclose($myfile);
                            ?>
        
        
        
        </div>
          <!--footer-->      
          <?php 
    include("footer.php");
    ?>
