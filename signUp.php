<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Paul Carr</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="1.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="pictures/icon.jpeg" type="image/gif" sizes="16x16">
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="index.php">Home</a>
  <a href="signUp.php" class="active">Sign Up</a>
  <a href="shop.php">Shop</a>
  <a href="logIn.php">Log In</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i> </a>
</div>

<div class="header"> <img src="pictures/picture18.jpeg" class="responsiveHeaderImage" width="600px" height="436px"> </div>

<form action="functions.php" method="post">
  <div class="container">
    <h1>Sign Up </h1>
   
    <form action="functions.php" method="post">
        Account Type: 
        <select name="accountCategory">
          <option value="Customer">Customer</option>
          <option value="Photograhper">Photographer</option>
        </select><br><br>
        First Name: <input type="text" name="fName" required/><br><br>
        Last Name: <input type="text" name="lName" required/><br><br>
        Email: <input type="text" name="emailAddress" required/><br><br>
        Password: <input type="password" name="userPassword" required/><br><br>
        
        <hr>
          <p>By creating an account you agree to our <a href="terms.php">Terms & Privacy</a>.</p>

      <button type="submit" name="userchoice" value="registeruser" class="registerbtn">Sign Up</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="logIn.php">Log In</a>.</p>
  </div>
</form>

<div class="footer"> </div>

<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>

</body>
</html>
