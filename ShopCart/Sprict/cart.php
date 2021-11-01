<?php

$conn = new mysqli("localhost", "root", "", "myshop");
$total =0;
$a= '<table  >
    		<tr>
        	<th >ID</th>
            <th>Image</th>
            <th>Type</th>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>';
     
$sql = "SELECT * FROM cart";
$result = $conn->query($sql);
$content = "";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		$content = $content."<tr align='center'><td>" . $row["id"]. " </td>". "<td>".'<img src='.$row["image"].' height="100" width="100">'."</td>
			  <td >" . $row["type"]. " </td>
			  <td >". $row["name"]. " </td>
			  <td >$". $row["price"]. " </td>". "
			  <td ><a href=cartDelete.php?id=".$row['cid'].">Delete</a></td></tr>";
			  $total +=$row['price'];
    }
}
$content = $a.$content."</table>";
$conn->close();
$add= '<div id="sidebar">
		<h1>Total price: $'."$total".'</h1>
		</div>';
include 'userHome.php';
?>