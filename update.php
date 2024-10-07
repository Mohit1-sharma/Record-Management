
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



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $orderid = $_POST['orderid'];
    $item = $_POST['Item'];
    $unitSold = $_POST['unitSold'];
    $unitOnOrder = $_POST['unitOnOrder'];
    $unitPrice = $_POST['unitPrice'];

    $sql = "UPDATE product SET Item = ?, unitSold = ?, unitOnOrder = ?, unitPrice = ? WHERE orderid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siisi", $item, $unitSold, $unitOnOrder, $unitPrice, $orderid);
  // if(false){
    if ($stmt->execute()) {
        $message = "Record updated successfully.";
        $message_type = "success";
    } else {
        $message = "Error updating record " . $conn->error;
        $message_type = "Error";
    }

    $stmt->close();
    $conn->close();
    $search = isset($_GET['search']) ? $_GET['search'] : 'null';
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    
       // echo($search);
       // die;
    // Redirect 
  header("Location: DisplayTable.php?search=" . urlencode($search) . "&page=" .urlencode($page). "&message=" . urlencode($message) . "&type=" . urlencode($message_type));

   //header("Location: DisplayTable.php?message=" . $message . "&type=" .$message_type);
    exit;
} else {
    echo "Invalid request.";
}
?>
