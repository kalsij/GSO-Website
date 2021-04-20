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
$title = "Contact Us";
include("header.php");
?>
        <!--title-->
        <h1 class="ProductTitle">Contact Us</h1>
        <div class="container shadow-lg " >
            <h1>Have some questions? <br/> Please fill out the information below:</h1>
            
            <!--information-->
            <form action = "Contact.php" method = "POST" onsubmit= "return checked()" >
            <div class="form-column">
              <div class=" justify-content-md-center">
                <div class="form-group contactuspage">
                    <p class = "formnames">User Name:</p>
                  <input style="background-color:white" name ="username" id ="username" type="text" class="form-control" placeholder='User Name' >
                </div>
                <div class="form-group contactuspage">
                  <p class = "formnames">Item Name:</p>
                    <input style="background-color:white" type="text" class="form-control" placeholder='Item Name' >
                </div>
                <div class="form-group contactuspage">
                  <p class = "formnames">Order Number</p>
                    <input style="background-color:white" name="ordernumber" id="ordernumber" type="text" class="form-control" placeholder = "Order Number">
                    <div class="form-group">
                      <p class = "formnames">Questions:</p>
                    <textarea class="form-control" rows="5" spellcheck="false"></textarea>
                </div>
</br>
                <button class="btn btn-outline-primary" name = "submit" type = "submit" value = "1" >Submit</button>
             </div>
            </div>
            </form>
          </div>
          </div>

              <!--footer--> 
              <?php include("footer.php") ?>
        </body>
    
    </html>
    
