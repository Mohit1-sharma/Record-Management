
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "mydata";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if (isset($_GET['orderid'])) {
    $orderid = $_GET['orderid'];

    // Delete the record
    $sql = "DELETE FROM product WHERE orderid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $orderid);
 //   if(false){
  if ($stmt->execute()) {
       // echo "Record deleted successfully.";
        $message= "Record deleted successfully";
        $message_type="success";
    } else {
       // echo "Error deleting record: " . $conn->error;
        $message="RECORD NOT Deleted";
        $message_type="Error";
    }

    $stmt->close();
    $conn->close();

    // Redirect back to the main page
   
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $search = isset($_GET['search']) ? $_GET['search'] : 'null';
   // echo($search);
    // die;



    header("Location: DisplayTable.php?search=" . urlencode($search) . "&page=" .urlencode($page) . "&message=" . urlencode($message) . "&type=" . urlencode($message_type));

 //  header("Location: DisplayTable.php?message=" .$message . "&type=" .$message_type);
    exit;
} else {
    echo "No item specified.";
}
?>



