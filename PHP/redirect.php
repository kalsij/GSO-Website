<?php
session_start();
session_unset();
session_destroy();
$title = "Redirection";
$js_file = "";
include("header_SU_SI.php");?>

<h1 style="margin-top:150px; text-align: center">Your account was successfully created. You can now login. </br></br></br></br></br> Press the following button to be redirected:
</br></br></h1>

<div style="text-align:center;">
<input type="button" value="LOGIN PAGE" id="red_but" style="width: 250px; height: 50px; margin: auto;"/>
</br></br></br></br></br></br></br></br></br></br></br>
</div>

<script type="text/javascript">
function changePage(){
window.open("SignIn.php", "_self");
}
var but = document.getElementById("red_but");
but.addEventListener("click", changePage);
</script>

<?php
include("footer.php");
?>