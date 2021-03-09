<?php
session_start();

if((!isset($_SESSION['user'])) || ($_SESSION['user']['accountCategory'] == "Photographer"))
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
  <a href="contact.php" class="active">Contact Us</a>
  <a href="<?php echo $link; ?>"> <?php echo $navlink; ?> </a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i> </a>
</div>

<div class="header"> <img src="pictures/picture18.jpeg" class="responsiveHeaderImage" width="600px" height="436px"> </div>

<form action="functions.php" method="post">
  <div class="container">
    <h1>Contact Us</h1>
   
    <form action="functions.php" method="post">
        Name: <input type="text" name="contactName" required/><br><br>
        Contact Number: <input type="text" name="contactNumber" required/><br><br>
        Event Type: 
        <select name="eventType"><br><br>
          <option value="Wedding">Wedding</option>
          <option value="Food">Food</option>
          <option value="Scenic">Scenic</option>
          <option value="Architecture">Architecture</option>
          <option value="Other">Other</option>
        </select><br><br>
        Address: <input type="text" name="contactAddress" required/><br><br>
        Town: <input type="text" name="town" required/><br><br>
        Post Code: <input type="text" name="postCode" required/><br><br>
        Start Time: <input type="text" name="startTime" required/><br><br>
        End Time: <input type="text" name="endTime" required/><br><br>
        Message: <textarea name="contactUs" required placeholder="Write something.." style="height:200px"></textarea>
        <button type="submit" name="userchoice" value="contactUs" class="registerbtn">Contact Us</button>
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


<?php
  }
?>
