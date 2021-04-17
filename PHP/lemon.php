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
$title = "Lemon";
include("header.php");
?>
        <h1> </h1>
        <div class="container shadow-lg" >
            <div class="row">
                <div class="col-md-6 "  >
                    <img class="picture" src="../Media/Lemons(daniel_kim_unsplash).jpg" alt="Lemon" style=" width:90%; display: block; margin: 0 auto; margin-bottom: 20px;">
                </div>

                <div class=" col-md-5 " style = " margin-right: 50px">
                    <h4><b>Lemon</b></h4>
                    
                        <br/>
                        <h3  style="color:red">
                            CAD 1.00$
                        </h3>
                        <p>
                            1.00$/EA
                        </p>
                        
                        
                        <form action = "ShoppingCart.php" method = "POST">
                        <input class = "product-quantity ml-2 mr-2" min = "1"type = "number" name = "quantity" id="totalMacaroni" value="1" style="width:20%;">
                       <!-- <button  onclick="incrementLemon()">+</button>
                        <p id="quantity" style="display: inline;" >1</p>
                        <button  onclick="decrementLemon()">-</button> -->
                        
                        <div class="btn">
                            <input type="submit" onclick="addLemonCart()" value="Add to cart" style = "background-color: black; color : white">
                        </div>
                        <div>
                            <p id="lemonPrice"></p>
                            <p id = "totalLemon"></p>
                        </div>
                        <?php
                        
                         
                        $_SESSION["ProductName"]="Lemon";
                        $_SESSION["ImageSrc"]="../Media/Lemons(daniel_kim_unsplash).jpg";
                        $_SESSION["price"]="CAD 1.00$";
                        $_SESSION["pricePerUnit"]="1.00$/EA";
                         
                        ?>
                        </form>
                        <br/>
                        <div style="padding-top: 20px;">
                            <button class="dropbtn">Product Description</button>
                            <div class="content">
                                <p>These lemons are the perfect complement to your smoked salmon or just for a simple but delicious lemonade. Produced in Quebec, it is the best way to encourage local!</p>
                            </div>
                        </div>
                        <script type = "text/javascript" src="../Javascript/script.js"></script>
                </div>
            </div> 
        </div>
            <!--Display of other products from same aisle-->
        <h1>Other related items</h1>
        <div class=" justify-content-md-center row">
            <div class="col-md-auto">
                <div class="tomato">
                    <a href="tomato.html">
                        <img src="../Media/Tomatoes(vince_lee_unsplash).jpg" alt="tomatoes" style="width:100%">
                    </a>
                    <h1 style="margin-top: auto; color:rgb(75, 75, 75);">Tomatoes</h1>
                    <p class="price" style="color:rgb(75, 75, 75);">$1.50<br />(40g avg)</p>
                    
                </div>
            </div>
           
            <div class="col-md-auto">
                <div class="blueberries">
                    <a href="blueberries.html">
                        <img src="../Media/Blueberries(veeterzy_WOg_unsplash).jpg" alt="blueberries" style="width:100%">
                    </a>
                    <h1 style="margin-top: auto; color:rgb(75, 75, 75);">Blueberries</h1>
                    <p class="price" style="color:rgb(75, 75, 75);">$5.50<br />(200g avg)</p>
                    
    
                </div>
            </div>
            <div class="col-md-auto">
                <div class="oranges">
                    <a href="orange.html">
                        <img src="../Media/oranges.jpg" alt="Oranges" style="width:100%">
                    </a>
                    <h1 style="margin-top: auto; color:rgb(75, 75, 75);">Oranges</h1>
                    <p class="price" style="color:rgb(75, 75, 75);">$5.50<br />(100g avg)</p>
                    
    
                </div>
            </div>
        </div>
        <!--footer-->        
        <?php 
    include("footer.php");
    ?>