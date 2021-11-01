<?php
@SESSION_START();
$conn = mysqli_connect("localhost", "root", "", "login");
if(isset($_GET['user'])){
		$suser=$_GET['user'];
		$_SESSION['user']= $suser;
	}
	$content = '';
	$userAc = $_SESSION['user'];
	$sql = "SELECT * FROM admin ";
	$result = $conn->query($sql);
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			if($row['adminName']==$_SESSION['user']){
				$idd=$row['id'];
				$content = $content.'You can change password here '. 
			'<form action="changeAdminPw.php? id='.$idd.'" method="post" >
            <p>
                <label>Username:</label>
                '.$row['adminName'].'
            </p><p>
                <label>Password:</label>
			</p>
			<p>
                <input type="text" id="pw" value="'.$row['adminPw'].'" name="pw"/>
            </p>
            <p>
                <input type="submit" id="bth" value="submit"/>
            </p>
        </form>';
		}
		}
	}
	
$conn->close();
$add='<div id="sidebar">
		<h2>Account: <p>admin</p></h2>
	  </div>';
include 'adminHome.php';
?>