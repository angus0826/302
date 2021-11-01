<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$id=$_GET["id"];
$p = $_POST["userPw"];

$sql="";

if($p != NULL){
	$sql = "UPDATE user SET userPw='$p' WHERE id=$id";
	$conn->query($sql) === TRUE;
}


$conn->close();
header("refresh:1; url=manageUser.php?id&userName&userPw ");
?>