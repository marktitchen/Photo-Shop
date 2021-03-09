<!DOCTYPE html>
<html>
<head>

<?php
$q = $_GET['q'];
$productid = "id";
$name = "name";
$code = "code";
$price = "price";
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
$sql="SELECT * FROM tbl_product WHERE id = '".$q."'";
$result = mysqli_query($conn,$sql);
//VALUES ($fname, $lname);

echo"
<table>
<tr>
<th>ID</th>
<th>Product Name</th>
<th>Price</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['pictureName'] . "</td>";
    //echo "<td>" . $row['uploaded_file'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
   // echo "<td>" . $row['userID'] . "</td>";
    echo "</tr>";
    $productid = $row['id'];
}
echo "</table>";
mysqli_close($conn);

?>


<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
</body>
</html>
















