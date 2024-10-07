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

$search = isset($_GET['search']) ? $_GET['search'] : 'null';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;


if (isset($_GET['orderid'])) {
    $orderid = $_GET['orderid'];

    // Get the current values
    $sql = "SELECT * FROM product WHERE orderid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $orderid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Record not found.";
        exit;
    }
} else {
    echo "No order ID specified.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h2>Edit Product</h2>
    <center>
    <form method="POST" action="update.php?search=<?php echo urlencode($search); ?>&page=<?php echo $page; ?>">
        <input type="hidden" name="orderid" value="<?php echo $row['orderid']; ?>">
        <p>
            <label for="Item">Item:</label>
            <input type="text" name="Item" id="Item" value="<?php echo $row['Item']; ?>" required>
        </p>
        <p>
            <label for="unitSold">Unit Sold:</label>
            <input type="number" name="unitSold" id="unitSold" value="<?php echo $row['unitSold']; ?>" required>
        </p>
        <p>
            <label for="unitOnOrder">Unit On Order:</label>
            <input type="number" name="unitOnOrder" id="unitOnOrder" value="<?php echo $row['unitOnOrder']; ?>" required>
        </p>
        <p>
            <label for="unitPrice">Unit Price:</label>
            <input type="number" name="unitPrice" id="unitPrice" value="<?php echo $row['unitPrice']; ?>" required>
        </p>
        <p>

            <input type="submit" value="Update">
            

        </p>
    </form>
</center>
</body>
</html>
