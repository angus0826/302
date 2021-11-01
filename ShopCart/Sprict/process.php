<?php 
$ac= $_POST['user'];
$pw= $_POST['pw'];

$host         = "localhost";
$username     = "root";

$password     = "";

$dbname       = "login";
$result_array = array();

/* Create connection */
$conn = new mysqli($host, $username, $password, $dbname);



$sql = "SELECT adminName, adminPw FROM admin ";
$usql = "SELECT userName, userPw FROM user ";
$i=0;
$result = $conn->query($sql);
$uresult = $conn->query($usql);
$user = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		if($row['adminName']==$ac&& $row['adminPw']==$pw){
			$id=$row['id'];
			$i++;
			header("Location: adminAccount.php?user=$ac");
		}
	}
}
if ($uresult->num_rows > 0) {
    while($urow = $uresult->fetch_assoc()) {
		if($urow['userName']==$ac&& $urow['userPw']==$pw){
			$id=$row['id'];
			$i++;
			header("Location: userAccount.php?user=$ac");
		}
	}
}
if($i!=1){
	header("refresh:1; url=login.html");
}

$conn->close();

?>