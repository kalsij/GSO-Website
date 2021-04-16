<?php 
$title = "Sign In";
$js_file = "../Javascript/signinJS.js";
include("header_SU_SI.php");
?>

<div id="blur">
        <h1 style="margin-top: 2.5cm;">Log Into Your Account</h1>
        <h2>-------------------------------------</h2>

        <form action="" class="justify-content-center">
            <fieldset id="field">
                <br />
                <div id="aAnnounce"></div>
                <label>Username (Email):</label>
                <br />
                <input type="text" name="signin_email" id="email" placeholder="Your email" />
                <span id="aE"></span>
                <br /><br />
                <label>Password:</label>
                <br />
                <input name="signin_password" type="password" id="password" placeholder="Your password" />
                <span id="aP"></span>
                <br />
                <input type="checkbox" name="Password Visibility" onclick="setPasswordVisible()" />
                <p style="display: inline;">Show Password</p>
                <br />
                <br />
            </fieldset>
            <br />
            <div id="sub"></div>
            <div style="text-align:center">
                <input type="submit" name="Submit" value="Sign In" onclick="verif(); return false;" />
                <br />
                <a href="" onclick="forgot(); return false;" style="font-size:14px">Forgot password?</a>
            </div>
        </form>
    </div>
    <br />
    <div id="space">
        <br />
        <br />
    </div>
    <form id="aForg" acion="" method="" style="position:relative"></form>
    <div id="feedback"></div>

<?php include("footer.php")?>