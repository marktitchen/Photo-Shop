<?php
session_start();

if((!isset($_SESSION['user'])) || ($_SESSION['user']['accountCategory'] != "Customer"))
{
        
  header('Location: logIn.php');
  //echo $_SESSION['user']['accountCategory'];
            
        
  } else {
            
      $link = "logOut.php";
      $navlink = "Log Out";
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
  <a href="shop.php">Shop</a>
  <a href="contact.php">Contact Us</a>
  <a href="customer.php" class="active">Customer</a>
  <a href="<?php echo $link; ?>"> <?php echo $navlink; ?> </a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i> </a>
</div>

<div class="header"> <img src="pictures/picture18.jpeg" class="responsiveHeaderImage" width="600px" height="436px"> </div>

<div class="container">

  <h2>Delete Account</h2>

  <form action="functions.php" method="post">
    ID: <input type="text" name="userID" required/><br><br>
    <button type="submit" name="userchoice" value="deleteuser" class="registerbtn">Delete Account</button>
  </form>


  <!--<h2>Update Account</h2>


  <form action="functions.php" method="post">
    ID: <input type="text" name="userID"><br><br>
    First Name: <input type="text" name="fName"><br><br>
    Last Name: <input type="text" name="lName" ><br><br>
    Password: <input type="text" name="userPassword"><br><br>
    Email Address: <input type="text" name="emailAddress" ><br><br>
    <button type="submit" name="userchoice" value="updatecustomer" class="registerbtn">Update Account</button>
  </form>-->
</div>

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


<?php
  }
?>

