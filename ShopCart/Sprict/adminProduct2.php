<?php
require 'Productdb.php';

	$a= '<table  >
    		<tr>
        	<th >id</th>
            <th>image</th>
            <th>type</th>
            <th>name</th>
            <th>price</th>
            <th>Action</th>
        </tr>';
	$type = 'aaa';
     
$sql = "SELECT * FROM product";
$result = $conn->query($sql);
$content = "";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		$content = $content."<tr align='center'><td>" . $row["id"]. " </td>". "<td>".'<img src='.$row["image"].' height="100" width="100">'."</td>
			  <td >" . $row["type"]. " </td>
			  <td >". $row["name"]. " </td>
			  <td >$". $row["price"]. " </td>". "
			  <td > <a href=Edit.php?id=".$row['id'].">Edit</a>
				   <a href=Delete.php?id=".$row['id'].">Delete</a></td></tr>";
		
    }
}
$search = "<form action = '' method = 'post' width = '200px'>
                    Please select a type: 
                    <select name = 'types' >
                        <option value = '%' >All</option>
                        " .$type.
                "</select>
                     <input type = 'submit' value = 'Search' />
                    </form>";
$content = $search.$a.$content."</table>";
	$add = '
		<div id="sidebar">
			<h1 >
				Add Product
			</h4> 
			<form action="AddProduct.php" method="post">
			<p>
			Type   :  <input type="text" name="type"><br>
			</p>
			<p>
			 Name: <input type="text" name="name"><br>
			</p>
			<p>
			 Price  :  <input type="text" name="price"><br>
			</p>
			<p>
			 Select image to upload:<input type="file" name="image" ><br>
			</p>
			<p>
			 <input type="submit" value="submit" >
			</p>
			</form>
		</div>
		';
include 'adminHome.php';
?>