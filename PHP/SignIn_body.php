<div id="blur">
        <h1 style="margin-top: 2.5cm;">Log Into Your Account</h1>
        <h2>-------------------------------------</h2>

        <form method="post" class="justify-content-center">
            <fieldset id="field">
                <br />
                <div id="aAnnounce"></div>
                <label>Username (Email):</label>
                <br />
                <input type="text" name="signinEmail" value="<?php print $_SESSION[signinEmail]?>" id="email" placeholder="Your email" />
                <span id="aE"></span>
                <br /><br />
                <label>Password:</label>
                <br />
                <input name="signinPassword" type="password" id="password" value="<?php print $_SESSION[signinPassword]?>" placeholder="Your password" />
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
                <input type="submit" name="submit" value="Sign In" />
                <br />
                <a href="" onclick="forgot(); return false;" style="font-size:14px">Forgot password?</a>
            </div>
        </form>
        <br />
        <p style="text-align:center; color:red;">
        <?php print $msg?>
        </p>
</div>

    <div id="space">
        <br />
        <br />
    </div>
    <form id="aForg" method="post" style="position:relative"></form>
    <div id="feedback"></div>
