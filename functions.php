<?php
session_start();


// works - 19 december
function processOrder() {
     
    if(isset($_SESSION['user']))
{
    include("connect.php");
    $userid = $_SESSION['user']['userID'];
    
    
    if(isset($_POST)){
       $ordertotal = $_POST['total'];
    }
   
   $sql = "INSERT INTO process_order (total, userID)
   VALUES ('$ordertotal','$userid')"; 

   if (mysqli_query($conn, $sql)) {
       $last_id = mysqli_insert_id($conn);
       echo "New record created successfully.";
       //echo $ordertotal;
       //echo $userid;
       $endURL = "?orderid=".$last_id."&price=".$ordertotal;
      
       header('Location: processorder.php'.$endURL); 
   
   } else {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
    
    mysqli_close($conn);
}else{
    header('Location: processorder.php');
}
}

// works - wednesday 19 december
function sellPicture() {
     
    include("connect.php");
    $userid = $_SESSION['user']['userID'];
    
    if(isset($_POST)){
        $picturename = $_POST['pictureName'];
        $price = $_POST['price'];
        $imagelocation = "".$_FILES['uploaded_file']['name'];
   }
   
   $sql = "INSERT INTO tbl_product (pictureName, uploaded_file, price, userID)
   VALUES ('$picturename', '$imagelocation', '$price', '$userid')"; 

   if (mysqli_query($conn, $sql)) {
       $last_id = mysqli_insert_id($conn);
       echo "New record created successfully.";
       header('Location: success.php'); 
   
   } else {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
     
    
   if(!empty($_FILES['uploaded_file']))
  {
    $path = "uploads/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
      " has been uploaded";
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  }

    mysqli_close($conn);  
}



//works wednesday 19th december
function logInUser() {   
    include("connect.php");
  
    if(isset($_POST)){
        $emailaddress = $_POST['emailAddress'];
        $userpassword = $_POST['userPassword'];
    }
        $sql = "SELECT * FROM user WHERE emailAddress = '$emailaddress' AND userPassword = '$userpassword'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // check the category of the user and redirect
            while($row = $result->fetch_assoc()) {
                $_SESSION['user']['userID'] = $row['userID'];
                $_SESSION['user']['accountCategory'] = $row['accountCategory'];

                $accountCategory = $row['accountCategory'];
                if ($accountCategory == 'Customer') {
                    header('Location: customer.php');
                } elseif ($accountCategory == 'Photographer') {
                     header('Location: photographer.php');
                } elseif ($accountCategory == 'Admin') {
                    header('Location: administrator.php');    
                } else {
                    header('Location: logIn.php');    
                }
            }
        } else {
            header('Location: logIn.php');  
        }       
}

function registerUser() {

    include("connect.php");
    
    if(isset($_POST)){
        $accountcategory = $_POST['accountCategory'];
        $emailaddress = $_POST['emailAddress'];
        $userPassword = $_POST['userPassword'];
        $fname = $_POST['fName'];
        $lname = $_POST['lName'];
    }
    
    $sql = "INSERT INTO user (fName, lName, userPassword, emailAddress, accountCategory)
    VALUES ('$fname', '$lname','$userPassword', '$emailaddress', '$accountcategory')";

    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
        echo "New record created successfully. Last inserted ID is: " . $last_id;
        header('Location: success.php');
    
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
    
   
}


// works december
function deleteUser() {
    
    include("connect.php");
        
    if(isset($_POST)){
        $userid = $_POST['userID'];
       
    }

    // sql to delete a record
    $sql = "DELETE FROM user WHERE userID='$userid'";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
        header('Location: success.php'); 

    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}












// works wednesday 19 december
function deleteProduct() {
    
    include("connect.php");
        
    if(isset($_POST)){
        $productid = $_POST['id'];
       
    }

    // sql to delete a record
    $sql = "DELETE FROM tbl_product WHERE id='$productid'";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
        header('Location: success.php'); 

    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}


// working wednesday 19 december
function addProduct() {
     
    include("connect.php");
    $userid = $_SESSION['user']['userID'];
    
    if(isset($_POST)){
        $picturename = $_POST['pictureName'];
        $price = $_POST['price'];
        $imagelocation = "".$_FILES['uploaded_file']['name'];
   }
   
   $sql = "INSERT INTO tbl_product (pictureName, uploaded_file, price, userID)
   VALUES ('$picturename', '$imagelocation', '$price', '$userid')"; 

   if (mysqli_query($conn, $sql)) {
       $last_id = mysqli_insert_id($conn);
       echo "New record created successfully.";
       header('Location: success.php'); 
   
   } else {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
     
    
   if(!empty($_FILES['uploaded_file']))
  {
    $path = "uploads/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
      " has been uploaded";
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  }

    mysqli_close($conn);  
}


// works wednesday 19 december
function contactUs() {

    include("connect.php");
    $userid = $_SESSION['user']['userID'];
    
    if(isset($_POST)){
        $contactname = $_POST['contactName'];
        $contactnumber = $_POST['contactNumber'];
        $eventtype = $_POST['eventType'];
        $contactaddress = $_POST['contactAddress'];
        $town = $_POST['town'];
        $postcode = $_POST['postCode'];
        $starttime = $_POST['startTime'];
        $endtime = $_POST['endTime'];
        $contactus = $_POST['contactUs'];
        
    }
    
   
    $sql = "INSERT INTO contact (`contactName`, `contactNumber`, `eventType`, `contactAddress`, `town`, `postCode`, `startTime`, `endTime`, `contactUs`, `userID`)
    VALUES ('$contactname', '$contactnumber', '$eventtype', '$contactaddress', '$town', '$postcode', '$starttime', '$endtime', '$contactus', '$userid')";
    
    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
        echo "New record created successfully. Last inserted ID is: " . $last_id;
        header('Location: success.php'); 

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }



    mysqli_close($conn);
    
   
}


// working wednesday 19th december
function updateProduct() {

    include("connect.php");
            
    if(isset($_POST)){
        $productid = $_POST['id'];
        $picturename = $_POST['pictureName'];
        $price = $_POST['price'];
    }
    
    $sql = "UPDATE tbl_product SET pictureName='$picturename', price='$price' WHERE id= $productid";
    
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
        header('Location: success.php'); 
    
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}




// working december 19
function resetUserPassword() {

    include("connect.php");
            
    if(isset($_POST)){
        $emailaddress = $_POST['emailAddress'];
        $userpassword = $_POST['userPassword'];
    }
    
    $sql = "UPDATE user SET userPassword='$userpassword' WHERE emailAddress= '$emailaddress'";
    
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
        header('Location: success.php'); 

    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
   
// works - 19 december
function errorCatch() {
    //code to be executed;
    echo "Error Catch Function";
}


if(isset($_POST)){
    $userChoice = $_POST['userchoice'];

    switch ($userChoice) {
        case "loginuser": logInUser(); break;
        case "updateuser": updateUser(); break;
        case "registeruser": registerUser();break;
        case "deleteuser": deleteUser();break;
        case "updateproduct": updateProduct(); break;
        case "addproduct": addProduct(); break;
        case "deleteproduct": deleteProduct(); break;
        case "updatephotographer": updatePhotograhper(); break;
        case "sellpicture": sellPicture(); break;
        case "deletephotographer": deletePhotographer(); break;
        case "contactUs": contactUs(); break;
        case "resetuserpassword": resetUserPassword(); break;
        case "processorder": processOrder(); break;
        default: errorCatch();
    }
}

?>