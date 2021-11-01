<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>City Shop</title>
        <link rel="stylesheet" type="text/css" href="Styles/homeStyle.css" />
    </head>
    <body>
    <div id="wrapper">
            <div id="banner">             
            </div>
            
    <nav id="navigation">
                <ul id="nav">
                    <li>
                      <div >
                        <div ><a href="#", id = "li">Home </a></div>
                      </div>
                    </li>
                    <li><a href="adminProduct.php", id = "li">Product </a></li>
                    <li> <a href="manageUser.php?id&userName&userPw", id = "li">User </a></li>
                    <li><a href="adminAccount.php", id = "li">Account </a></li>
                    <li> <a href="home.php", id = "li">LogOut </a> </li>
      </ul>
    </nav>
      
        	<?php echo $add; ?>
      		<div id="content_area" >
            	<h1><?php echo $content; ?></h1>
        	</div>
   	  <footer>
      </footer>
    </div>
    </body>
</html>