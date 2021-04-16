<h1 style="margin-top: 2.5cm;">Create Your Account</h1>
    <h2>-------------------------------------</h2>

    <form action="" method ="post">
        <fieldset class=" styleForm" id="field1">
            <br />
            <div id="aAnnounce"></div>
            <label>First Name:</label>
            <br />
            <input type="text" id="firstName" name="firstName" value="<?php print $_SESSION[firstName] ?>" placeholder="Your name" />
            <span id="aFName"></span>
            <br />
            <label>Last Name:</label>
            <br />
            <input type="text" id="lastName" name="lastName" value="<?php print $_SESSION[lastName] ?>" placeholder="Your last name" />
            <span id="aLName"></span>
            <br /><br />
            <label>Gender:</label>
            <input type="radio" id="male" name="gender" value="Male" <?php print $_SESSION[maleGender]?> >M</input>
            <input type="radio" id="female" name="gender" value="Female" <?php print $_SESSION[femaleGender]?>>F</input>
            <span id="aGender"></span>
            <br /><br />
            <label>Postal Code:</label>
            <br />
            <input type="text" id="postalCode" name="postalCode" value="<?php print $_SESSION[postalCode] ?>" placeholder="Your postal code" />
            <span id="aPost"></span>
            <br /><br />
            <label>Email:</label>
            <br />
            <input type="text" id="email1" name="signupEmail" value="<?php print $_SESSION[signupEmail] ?>" placeholder="Your email" />
            <span id="aEmail1"></span>
            <br />
            <label>Confirm Email:</label>
            <br />
            <input type="text" id="email2" name="signupEmail2" value="<?php print $_SESSION[signupEmail2] ?>" placeholder="Reenter your email" />
            <span id="aEmail2"></span>
            <br /><br />
            <label>Password:</label>
            <br />
            <input type="password" id="password1" name="signupPassword" value="<?php print $_SESSION[signupPassword] ?>" placeholder="Your password" />
            <span id="aPass1"></span>
            <p style="font-size: x-small; margin-left:0.5cm">(You password must have at least 8 characters)</p>
            <label>Confirm Password:</label>
            <br />
            <input type="password" id="password2" name="signupPassword2" value="<?php print $_SESSION[signupPassword2] ?>" placeholder="Reenter your password" />
            <span id="aPass2"></span>
            <input type="checkbox" onclick="seePassword()" style="display:inline;" />
            <br /><br />
        </fieldset>

        <br />

        <fieldset>
            <span id="aCond"></span>
            <input type="checkbox" id="conditions" name="conditions" <?php print $_SESSION[conditions]?>/>
            <p style="display: inline;">I have read and accept the</p>
            <a href="Terms_of_Use.php" target="_blank">Terms of Service</a>
            <p style="display: inline;">.</p>
            <br />
        </fieldset>
        <br />


        <div style="text-align:center;">
            <input type="submit" name="signupSubmit" value="Reset" />
            <input type="submit" name="signupSubmit" value="Create Account" />
            </ br> </ br> </ br>
        </div>

        <div id="aSubmitted"></div>
    </form>

    <br />
    <br />