<?php
$connect = mysqli_connect("localhost", "root", "", "myshop");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM product 
	WHERE id LIKE '%".$search."%'
	OR type LIKE '%".$search."%' 
	OR name LIKE '%".$search."%' 
	OR price LIKE '%".$search."%'
	";
}
else
{
	$query = "SELECT * FROM product ORDER BY id";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '
					<table width="400">
						<tr align="center">
							<th>ID</th>
							<th>Image</th>
							<th>Type</th>
							<th>Name</th>
							<th>Price</th>
							<th>Action</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr align="center">
				<td>'.$row["id"].'</td>
				<td>'.'<img src='.$row["image"].' height="200" width="200">'.'</td>
				<td align="center">'.$row["type"].'</td>
				<td align="center">'.$row["name"].'</td>
				<td align="left" >$'.$row["price"].'</td>'.
				"
			    <td > <a href=Edit.php?id=".$row['id'].">Edit</a>
				      <a href=Delete.php?id=".$row['id'].">Delete</a></td>
			</tr>";
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>