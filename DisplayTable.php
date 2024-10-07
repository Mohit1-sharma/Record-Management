<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Table</title>
    <link rel="stylesheet" href="mystyle.css">
</head>
<body>

<a href="userinputForm.php">User Input Form</a>
<br>
<center>
<?php
$search = isset($_GET['search']) ? $_GET['search'] : '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5;
$offset = ($page - 1) * $limit;



?>

<form method="GET" action="DisplayTable.php">

  <input type="text" name="search" placeholder="Search..." value="<?php echo htmlspecialchars($search); ?>" >
  <input type="submit" value="Search">
</form>

 



<?php

$servername = "localhost";
$username = "root";
$password = "";
$database ="mydata";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$search_query = "";
if(!empty ($search)) {
 // $search = $_GET['search'];
  $search_query = "WHERE orderid LIKE '%$search%' OR Item LIKE '%$search%' OR unitSold LIKE '%$search%' OR unitOnOrder LIKE '%$search%' OR unitPrice LIKE '%$search%'";
}

// total number of records
$total_sql = "SELECT COUNT(*) as total FROM product $search_query";
$total_result = $conn->query($total_sql);
$total_row = $total_result->fetch_assoc();


// calculating total pages...
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $limit);








$sql = "SELECT * FROM product $search_query LIMIT $limit OFFSET $offset";
 
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<h2>Record Table</h2>";
    echo "<table>";
    echo "<tr>
            <th>orderid</th>
            <th>Item</th>
            <th>unitSold</th>
            <th>unitOnOrder</th>
            <th>unitPrice</th>
            <th>Modification</th>
          </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['orderid']}</td>
                <td>{$row['Item']}</td>
                <td>{$row['unitSold']}</td>
                <td>{$row['unitOnOrder']}</td>
                <td>{$row['unitPrice']}</td>
                <td>
                 <a href='edit.php?orderid={$row['orderid']}&search=" . urlencode($search) . "&page=$page'>Edit</a> / 
                  <a href='delete.php?orderid={$row['orderid']}&search=" . urlencode($search) . "&page=$page' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</a>

                
               
               </td>
                 
               
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No records found.</p>";
}


for ($i = 1; $i <= $total_pages; $i++) {
 
  if ($i == $page) {
    echo " $i ";
} else {
    echo "<a href='DisplayTable.php?search=" . urlencode($search) . "&page=$i'>$i</a> ";
}
}











if(isset($_GET['message']) && isset($_GET['type'])) {
  $message = $_GET['message'];
  $type = $_GET['type'];
  echo "<h3 class='$type'>$message</h3>";
}

$conn->close();
?>
</center>
</body>
</html>
