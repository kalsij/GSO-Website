 <?php include("backstoreHeader.php");?>
    <form action="">
              <div>
            <input type="submit" name="signupSubmit" value="Add User" onclick="userAdd();return false;"class="btn btn-primary" style="float:right;"/>
            <input type="submit" name="signupSubmit" value="Reset" onclick="clear()"class="btn btn-secondary" style="float:right; margin-right: 5px;"/>

        </div>
        <fieldset>
            <br />
            <div class="form-row">
                        <div class="form-group col-md-6">
            <div id="aAnnounce"></div>
            <label>First Name:</label>
            <input type="text" name="fName" class="form-control"id="firstName"   />
            <span id="aFName"></span>
            </div>
            <br />
            <div class="form-group col-md-6">
            <label>Last Name:</label>
            <br />
            <input type="text" name="lName" class="form-control" id="lastName"   />
            <span id="aLName"></span>
            </div>
            </div>
            <br />
            <label>Gender:</label>
            <input type="radio" id="male" name="gender" style="margin: 0 10px 0 2px;" value="Male" >Male</input>
            <input type="radio" id="female" name="gender" style="margin: 0 10px 0 30px;"value="Female" >Female</input>
            <span id="aGender"></span>
          <br />
            <div class="form-row">
                          
                          <div class="form-group col-md-6">
            <label>Postal Code:</label>
            <input type="text" id="postalCode" class="form-control" />
            <span id="aPost"></span>
                          </div>
                          </div>

                          <div class="form-row">
                          
                          <div class="form-group col-md-6">
            <label>Email:</label>
           
            <input type="text" name="email"class="form-control"  id="email1" />
            <span id="aEmail1"></span>
            <br /> </div>
           <div class="form-group col-md-6">
            <label>Confirm Email:</label>
            
            <input type="text" class="form-control" id="email2" />
            <span id="aEmail2"></span>
           </div>
           </div>
            <br />
            <div class="form-row">
                          
                          <div class="form-group col-md-6">
            <label>Password:</label>
            
            <input type="password" name="password"class="form-control" id="password1" placeholder="Atleast 8 Characters" />
            <span id="aPass1"></span> 
            </div>
                          <div class="form-group col-md-6">
            <label>Confirm Password:</label>
            <input type="password" class="form-control" id="password2"  />
            <span id="aPass2"></span>
                          </div>
                          </div>
 
        </fieldset>


        <br />


    </form>

    <br />
    <div id="aSubmitted"></div>
    <br />
    <br />
    <?php include("footer.php");?>
