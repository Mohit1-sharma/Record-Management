<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>savedProducts</title>
</head>
<body>
<a href="userinputForm.php">userinputForm</a>
    <br>
    <a href="DisplayTable.php">DisplayTable</a>
    <br>
    <center>
   
<?php

$conn =  mysqli_connect("localhost", "root", "", "mydata");

// Check connection
if ($conn === false) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
echo("<br>");



$Item = $_REQUEST['Item'];
$unitSold = $_REQUEST['unitSold'];
$unitOnOrder = $_REQUEST['unitOnOrder'];
$unitPrice = $_REQUEST['unitPrice'];
   
$sql = "INSERT INTO product (Item, unitSold, unitOnOrder, unitPrice) VALUES ('$Item', '$unitSold', '$unitOnOrder', '$unitPrice')";


if(mysqli_query($conn, $sql)) {
 // if (false){
  echo("<h3>Data stored in DB successfully.</h3>");
  $message= "Record added successfully";
  $message_type="success";
    echo("<br>");
    echo nl2br("\n$Item\n$unitSold\n$unitOnOrder\n$unitPrice");



  
}else{
"Error : $sql. ".mysqli_error($conn);
$message="RECORD NOT ADDED";
$message_type="Error";

}
// {
//     
//     

// }else{
//    
// }
    



    // Redirect back to the main page with a success parameter
    header("Location: DisplayTable.php?message=" .$message . "&type=" .$message_type);
    
    exit;



mysqli_close($conn);


?>
</center>
</body>
</html>


