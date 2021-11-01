<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myshop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$id=$_GET["id"];
$image = $_POST["image"];
$type = $_POST["type"];
$name = $_POST["name"];
$price = $_POST["price"];

$sql1="";
$sql2="";
$sql3="";
$sql4="";

if($image != NULL){
	$sql1 = "UPDATE product SET image='$image' WHERE id=$id";
	$conn->query($sql1) === TRUE;
}
if($type != NULL){
	$sql2 = "UPDATE product SET type='$type' WHERE id=$id";
	$conn->query($sql2) === TRUE;
}
if($name != NULL){
	$sql3 = "UPDATE product SET name='$name' WHERE id=$id";
	$conn->query($sql3) === TRUE;
}
if($price != NULL){
	$sql4 = "UPDATE product SET price='$price' WHERE id=$id";
	$conn->query($sql4) === TRUE;
}


$conn->close();
header("refresh:1; url=adminProduct.php ");

?>