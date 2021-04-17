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
$title = "Cheese";
include("header.php");
?>

<h1> </h1>
    <div class="container shadow-lg ">
        <div class="row">
            <div class="col-md-6 ">
                <img class="picture" src="../Media/cheese.jpg" alt="Cheese"
                    style="width:90%; display: block; margin: 0 auto; margin-bottom: 20px;">
            </div>

            <div class=" col-md-5 " style=" margin-right: 50px">
                <h4><b>Cheese</b></h4>
                <p>963g</p>

                <h3 style="color:red">
                    CAD 10.50$
                </h3>
                <p>
                    1.09$/100g
                </p>
                <button type="button" onclick="incrementNbrCheese()">+</button>
                <div id="aNbr" style="display: inline;">
                    <script type="text/javascript">
                        var aNbr = document.getElementById("aNbr");
                        var nbr = getNbrCheese().toString();
                        var text = document.createElement("p");

                        text.id = "nb";
                        text.textContent = nbr;
                        text.style.display = "inline";
                        aNbr.appendChild(text);
                    </script>
                </div>
                <button type="button" onclick="decrementNbrCheese()">-</button>

                <div class="btn">
                    <button type="submit" onclick="cheeseAddToCart()">Add to cart</button>
                </div>
                <div id="aSummary">
                </div>
                <br />
                <div style="padding-top: 20px;">
                    <button class="dropbtn" onclick="cheeseDescrip()">Product Description</button>
                    <div id="aDescrip"></div>
                </div>
            </div>
        </div>
    </div>

    <!--Display of other products from same aisle-->
    <h1>Other related items</h1>
    <div class=" justify-content-md-center row">

        <div class="col-md-auto">
            <div class="milk">
                <a href="milk.php">
                    <img src="../Media/milk.jpg" alt="milk" style="width:100% ; max-height:200px;">
                </a>
                <h1 style="margin-top: auto; color:rgb(75, 75, 75);">Milk</h1>
                <p class="price" style="color:rgb(75, 75, 75);">$4.00<br />(2L)</p>
            </div>
        </div>
        <div class="col-md-auto">
            <div class="yogurt">
                <a href="yogurt.php">
                    <img src="../Media/yogurt.jpg" alt="yogurt" style="width:100%;max-height:200px;">
                </a>
                <h1 style="margin-top: auto; color:rgb(75, 75, 75);">Yogurt</h1>
                <p class="price" style="color:rgb(75, 75, 75);">$5.00<br />(500g avg)</p>

            </div>
        </div>
        <div class="col-md-auto">
            <div class="butter">
                <a href="butter.php">
                    <img src="../Media/butter.jpg" alt="butter" style="width:100%;max-height:200px;">
                </a>
                <h1 style="margin-top: auto; color:rgb(75, 75, 75);">Butter</h1>
                <p class="price" style="color:rgb(75, 75, 75);">$2.50<br />(300g avg)</p>

            </div>
        </div>
    </div>

<?php
include("footer.php");
?>