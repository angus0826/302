<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$id=$_GET["id"];
$p = $_POST["pw"];

$sql="";

if($p != NULL){
	$sql = "UPDATE admin SET adminPw='$p' WHERE id=$id";
	$conn->query($sql) === TRUE;
}


$conn->close();
header("refresh:1; adminAccount.php");
?>