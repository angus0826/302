<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// sql to delete a record
$sql = "DELETE FROM user WHERE id=$_GET[id]";

if ($conn->query($sql) === TRUE) {
echo "Record deleted successfully";
} else {
echo "Error deleting record: " . $conn->error;
}

$conn->close();

header("refresh:1; url=manageUser.php");
?>