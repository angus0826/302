<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myshop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// sql to delete a record
$sql = "DELETE FROM product WHERE id=$_GET[id]";

$conn->query($sql) === TRUE;

$conn->close();

header("refresh:1; url=adminProduct.php");
?>