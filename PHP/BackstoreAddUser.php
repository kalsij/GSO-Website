 <!DOCTYPE html>
<html lang="en">

<head>
    <title>Add User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    //Bootstrap
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    //Style
    <link rel="stylesheet" type="text/css" href="../Styles/BackstoreStyle.css"/>
    //JavaScript
    <script type="text/javascript" src="../Javascript/userAdd.js"></script>

</head>

<body>
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top" style="background-color: blue; position:fixed;">
            <h1 style="margin-top:0mm;color:white; font-size:50px;font-style:italic; font-weight:bold; margin-right:1cm;">
                GSO</h1>
    </nav>
     
    
    <div class="container-fluid text-center">    
        <div class="row content" >

            <!-- Side Bar -->
            <div class="col-sm-2 sidenav">
                <br/>
                <p><a href="GroceryStore-1.html">Home</a></p>
                <p><a href="GroceryStore-1.html">Grocery Store</a></p>
                <p><a href="BackstoreProductList.html">Product List</a></p>
                <p><a href="BackstoreOrderList.html">Order List</a></p>
                <p> <a href="BackstoreUserList.html">User List</a></p>
                <p style="font-weight:bold;"><a href="">Log Out</a></p>
            </div>


            <div class="col-sm-8 text-left">       
                <div class="right">
                    <h2 style="font-style: italic;">Add User</h2>
                    <br/>
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
