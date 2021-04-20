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
$title = "Fruits and Vegetables";
include("header.php");
?>
<!----------Product Cards---------->
<h1 class="ProductTitle">Fruits and vegetables</h1>
                <div class=" justify-content-md-center row">

                  <?php 
                                $myfile = fopen("../Data/productList.txt", "r") or die("Unable to open file!");
                                // Output one line until end-of-file
                                while(!feof($myfile)) {
                                  $line = fgets($myfile);
                                  if (strlen($line) < 5){
                                      break;
                                  }
                            
                                  $elements = explode(";", $line);
                                  
                                  if (strcmp($elements[3], "Fruits & Vegetables") == 0)  {
                                    echo "<div class=\"col-md-auto\">";
                                    echo "<div class=\"coca-cola\">";
                                        echo "<a href=\"product-detail.php?id=$elements[0]\">";
                                            echo "<img src=\"../$elements[1]\" alt= \" $elements[2] \" style=\"width:100% ; max-height:200px;\">";
                                        echo "</a>";
                                        echo "<h1 style=\"margin-top: auto; color:rgb(75, 75, 75);\">$elements[2]</h1>";
                                        echo "<p class=\"price\" style=\"color:rgb(75, 75, 75);\">$elements[6]<br/>($elements[8])</p>";
                                        
                                    echo "</div>";
                                  echo "</div>";


                                  



                                  }  

                                }
                                fclose($myfile);
                            ?>
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
          <li><a href="Contact Us.html" a class="text-muted">Contact us</a></li>
          <li><a class="text-muted">Our story</a></li>
          <li><a class="text-muted">FAQ</a></li>
        </ul>
      </div>
    </div>
  </footer>
</body>
</html> 
