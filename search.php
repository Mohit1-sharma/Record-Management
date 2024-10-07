<!--  
<html>
    <head>

    <title>Search</title>
    </head>

<body>
    <center>

 <?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "mydata";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $search = isset($_GET['search']) ? $_GET['search'] : '';
// $search_param = "%{$search}%";

// $sql = "SELECT * FROM product WHERE Item LIKE ? OR unitSold LIKE ? OR unitOnOrder LIKE ? OR unitPrice LIKE ?";
// // $stmt = $conn->prepare($sql);
// // $stmt->bind_param("ssss", $search_param, $search_param, $search_param, $search_param);

// // $stmt->execute();
// // $result = $stmt->get_result();

if(isset($_GET['search'])) {
    $search = $_GET['search'];
     
    $sql = "SELECT * FROM PRODUCT WHERE orderid LIKE'%$search%' OR Item LIKE'%$search%' OR unitSold LIKE'%$search%' OR unitOnOrder LIKE'%$search%'OR unitPrice LIKE'%$search%'";
    $result = mysqli_query($conn,$sql);
  
if(mysqli_num_rows($result)>0){
    echo("<h2>Output </h2><table border='3'>");
    echo("<tr>
    <th>orderid</th>
    <th>Item</th>
    <th>unitSold</th>
    <th>unitOnOrder</th>
    <th>unitPrice</th>
    <th>Modification</th>
    </tr>"); 
  while($row = mysqli_fetch_assoc($result)) {
        echo('<tr>');
        echo('<td>'.$row['orderid'].'</td>');
        echo('<td>'.$row['Item'].'</td>');
        echo('<td>'.$row['unitSold'].'</td>');
        echo('<td>'.$row['unitOnOrder'].'</td>');
        echo('<td>'.$row['unitPrice'].'</td>');
        echo('<td><a href="edit.php?orderid='.$row['orderid'].'">Edit</a> / <a href="delete.php?orderid='.$row['orderid'].'" onclick="return confirm(\'Are you sure you want to delete?\')">Delete</a></td>');
        echo('</tr>');
      
  }
  echo('</table>');
  
        $message="search data successfully";
        $message_type="success";
} else {
    echo "No records found.";
    $message = "search result not found";
    $message_type="Error";
}

}




// if ($result->num_rows > 0) {
//     echo("<h2>Output </h2><table border='3'>");
//     echo("<tr>
//     <th>orderid</th>
//     <th>Item</th>
//     <th>unitSold</th>
//     <th>unitOnOrder</th>
//     <th>unitPrice</th>
//     <th>Modification</th>
//     </tr>"); 
//     while($row = $result->fetch_assoc()) {
//         echo('<tr>');
//         echo('<td>'.$row['orderid'].'</td>');
//         echo('<td>'.$row['Item'].'</td>');
//         echo('<td>'.$row['unitSold'].'</td>');
//         echo('<td>'.$row['unitOnOrder'].'</td>');
//         echo('<td>'.$row['unitPrice'].'</td>');
//         echo('<td><a href="edit.php?orderid='.$row['orderid'].'">Edit</a> / <a href="delete.php?orderid='.$row['orderid'].'" onclick="return confirm(\'Are you sure you want to delete?\')">Delete</a></td>');
//         echo('</tr>');
        
//     }
//     echo('</table>');
//     $message="search data successfully";
//     $message_type="success";
// } else {
//     echo "No records found.";
//     $message = "search result not found";
//     $message_type="Error";
// }





//$stmt->close();
$conn->close();
//header("Location: DisplayTable.php?message=" .$message . "&type=" .$message_type);
?>

</center>
</body>
</html>  -->