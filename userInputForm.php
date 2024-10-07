<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding data to Database</title>
    <link rel="stylesheet" href="mystyle.css">
</head>
<body>
    <a href="DisplayTable.php">DisplayTable</a>
    <br>
  
    <center>
        <h1>Storing data in Database </h1>
        <form action ="SaveProduct.php" method="post">
            <p> 
                <label for = "Item">Item:</label>
                <input type ="text" name="Item" id="Item" required>
            </p>  
            <p>  
              <label for="unitSold">unitSold:</label>
                <input type="number" name="unitSold"id="unitSold" required>
            </p>   
            <p>  
              <label for="unitOnOrder">unitOnOrder:</label>
                <input type="number" name ="unitOnOrder" id="unitOnOrder" required>
            </p> 
            <p>  
              <label for="unitPrice">unitPrice:</label>
                <input type="number" name="unitPrice" id="unitPrice" required>
            </p>    
           
            <input type="submit" value="SAVE">
        </form>  
    </center>
</body> 
             
</html>
