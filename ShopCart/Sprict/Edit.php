
<?php
$content = '<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Search</span>
					<input type="text" name="search_text" id="search_text" placeholder="Search by Product Details" class="form-control" />
				</div>
			</div>
			<div id="result"></div>
		</div>
		<div style="clear:both"></div>
	</body>';

$content = $content.
"<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:'fetch.php',
			method:'post',
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>";
$n = $_GET['id'];
    	$add = '
		<div id="sidebar">
		<h1 >
        	Edit Product 
        </h1> 
		
        <form action="EditProduct.php?id='."$n".'" method="post">
        	<p>
			ID   :  '."$n".'
			</p>
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
		</div>';
include 'adminHome.php';
?>