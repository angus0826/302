<?php
@SESSION_START();
$conn = mysqli_connect("localhost", "root", "", "login");
if(isset($_GET['user'])){
		$suser=$_GET['user'];
		$_SESSION['user']= $suser;
	}
	$content = '';
	$userAc = $_SESSION['user'];
	$sql = "SELECT * FROM user ";
	$result = $conn->query($sql);
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			if($row['userName']==$_SESSION['user']){
				$idd=$row['id'];
				$content = $content.'You can change password here '. 
			'<form action="changeUserPw.php? id='.$idd.'" method="post" >
            <p>
                <label>Username:</label>
                '.$row['userName'].'
            </p><p>
                <label>Password:</label>
			</p>
			<p>
                <input type="text" id="pw" value="'.$row['userPw'].'" name="pw"/>
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
		<h2>Account: <p>user</p></h2>
	  </div>';
include 'userHome.php';
?>