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
$title = "Yogurt";
include("header.php");
?>

<h1> </h1>
    <div class="container shadow-lg ">
        <div class="row">
            <div class="col-md-6 ">
                <img class="picture" src="../Media/yogurt.jpg" alt="Butter"
                    style="width:90%; display: block; margin: 0 auto; margin-bottom: 20px;">
            </div>

            <div class=" col-md-5 " style=" margin-right: 50px">
                <h4><b>Yogurt</b></h4>
                <br />

                <h3 style="color:red">
                    CAD 5.00$/unit
                </h3>
                <p>
                    0.50$/mL
                </p>
                <button type="button" onclick="incrementNbrYog()">+</button>
                <div id="aNbr" style="display: inline;">
                    <script type="text/javascript">
                        var aNbr = document.getElementById("aNbr");
                        var nbr = getNbrYog().toString();
                        var text = document.createElement("p");

                        text.id = "nb";
                        text.textContent = nbr;
                        text.style.display = "inline";
                        aNbr.appendChild(text);
                    </script>
                </div>
                <button type="button" onclick="decrementNbrYog()">-</button>

                <div class="btn">
                    <button type="submit" onclick="yogAddToCart()">Add to cart</button>
                </div>
                <div id="aSummary">
                </div>
                <br />
                <div style="padding-top: 20px;">
                    <button class="dropbtn" onclick="yogDescrip()">Product Description</button>
                    <div id="aDescrip"></div>
                </div>
            </div>
        </div>
    </div>
    <!--Display of products from same aisle-->
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
            <div class="cheese">
                <a href="cheese.php">
                    <img src="../Media/cheese.jpg" alt="cheese" style="width:100%; max-height:200px;">
                </a>
                <h1 style="margin-top: auto; color:rgb(75, 75, 75);">Cheese</h1>
                <p class="price" style="color:rgb(75, 75, 75);">$10.50<br />(963g avg)</p>

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