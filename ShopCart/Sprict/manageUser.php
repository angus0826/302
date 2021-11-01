<?php
$host         = "localhost";
$username     = "root";
$password     = "";
$dbname       = "login";

$conn = new mysqli($host, $username, $password, $dbname);



	$a= '<table  >
    		<tr>
        	<th>ID</th>
            <th>Account</th>
            <th>Password</th>
            <th>Action</th>
        </tr>';
     
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
$content = "";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		$content = $content."<tr align='center'><td>" . $row["id"]. " 
			  <td >" . $row["userName"]. " </td>
			  <td >". $row["userPw"]. "
			  <td > <a href=manageUser.php?id=".$row['id']."&userName=".$row['userName']."&userPw=".$row['userPw'].">Edit</a>
				   <a href=acDelete.php?id=".$row['id'].">Delete</a></td></tr>";
		
    }
}
$content = $a.$content."</table>";
$i = $_GET['id'];
$n = $_GET['userName'];
$p = $_GET['userPw'];
    	$add = '
		<div id="sidebar">
		<h1>Edit Ac</h1> 
		
        <form action="accountEdit.php?id='."$i".'" method="post">
        	<p>
			ID   :   '."$i".'
			</p>
			<p>
			Account   :  '."$n".'<br>
			</p>
			<p>
			 Password : <input type="text" value="'."$p".'"name="userPw"><br>
			</p>
			<p>
			 <input type="submit" value="submit" >
			</p>
		</form>
		</div>';
include 'adminHome.php';
?>