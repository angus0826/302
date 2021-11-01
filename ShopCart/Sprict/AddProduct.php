<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myshop";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$image = $_POST["image"];
$type = $_POST["type"];
$name = $_POST["name"];
$price = $_POST["price"];

$sql = "INSERT INTO product (image, type, name, price)
VALUES ('$image', '$type', '$name','$price')";
mysqli_query($conn, $sql);

$conn->close();
header("refresh:1; url=adminProduct.php ");
?>