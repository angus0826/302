<?php
$host         = "localhost";
$username     = "root";

$password     = "";

$dbname       = "myshop";

/* Create connection */
$conn = new mysqli($host, $username, $password, $dbname);

$id=$_GET['id'];

$sql = "SELECT * FROM product WHERE $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$csql = "INSERT INTO cart (id ,image, type, name, price)
VALUES ('$id','$row[image]', '$row[type]', '$row[name]','$row[price]')";
		
    }
}

mysqli_query($conn, $csql) ;
$conn->close();

header("refresh:1; url=userProduct.php");
?>
