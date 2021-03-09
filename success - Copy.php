<?php
session_start();

if((isset($_SESSION['user'])) && ($_SESSION['user']['accountCategory'] == "Admin"))
{
    
    header('Location: administrator.php');
    $link = "administrator.php";
    $navlink = "Administrator";
      
    } else if((isset($_SESSION['user'])) && ($_SESSION['user']['accountCategory'] == "Customer")) {
        
        header('Location: customer.php');

    } else if((isset($_SESSION['user'])) && ($_SESSION['user']['accountCategory'] == "Photographer")) {
        
        header('Location: photographer.php');
    
    } else {
        
        header('Location: logIn.php');

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Paul Carr</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="1.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="pictures/grimsby1.png" type="image/gif" sizes="16x16">
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="index.php">Home</a>
  <a href="shop.php" class="active">Shop</a>
  <a href="<?php echo $link; ?>"> <?php echo $navlink; ?> </a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i> </a>
</div>

<div class="header"> <img src="pictures/picture18.jpeg" style="width:100%; height:436px;"> </div>



<h2> Success!! </h2>

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