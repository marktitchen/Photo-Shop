<?php
session_start();

if((!isset($_SESSION['user'])) || ($_SESSION['user']['accountCategory'] != "Admin") )
{
    
      header('Location: logIn.php');
      
        
    
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


<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getproduct.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="index.php">Home</a>
  <a href="administrator.php" class="active">Administrator</a>
  <a href="<?php echo $link; ?>"> <?php echo $navlink; ?> </a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i> </a>
</div>

<div class="header"> <img src="pictures/picture18.jpeg" class="responsiveHeaderImage" width="600px" height="436px"> </div>

<div class="container">

    <h1>Add New Product</h1>
    <form enctype="multipart/form-data" action="functions.php" method="POST">
      Picture Title: <input type="text" name="pictureName"/><br><br>
      Price: <input type="text" name="price"/><br><br>
      <input type="file" name="uploaded_file"><br>
      <button type="submit" name="userchoice" value="addproduct" class="registerbtn">Add Product</button> 
    </form>




    




    <form>
<select name="q" onchange="showUser(this.value)">
  <option value="">Select a product:</option>
  <?php
    $q = $_GET['q'];
    $productid = "id";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "s0238905";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($conn,"$dbname");
    $sql="SELECT * FROM tbl_product";
    $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_array($result)) { 
        echo "<option value=\"".$row['id']."\">".$row['id']."</option>";
        
    }
  ?>
  
  </select>
</form>
<br>
<div id="txtHint"><b>Product info will be listed here...</b></div>



    <h1>Update Product</h1>
    <form enctype="multipart/form-data" action="functions.php" method="POST">
        Product ID: <input type="text" name="id" /><br><br>
        Name: <input type="text" name="pictureName" /><br><br>
        Price: <input type="text" name="price" /><br><br>
        <button type="submit" name="userchoice" value="updateproduct" class="registerbtn">Update Product</button>
    </form>


    <h1>Delete Product</h1>
    <form enctype="multipart/form-data" action="functions.php" method="POST">
        Product ID: <input type="text" name="id" /><br><br>
        <button type="submit" name="userchoice" value="deleteproduct" class="registerbtn">Delete Product</button>
    </form>










 


  
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