
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="Styles/homeStyle.css" />
    </head>
    <body>
    <div id="wrapper">
            <div id="banner">             
            </div>
            
    <nav id="navigation">
                <ul id="nav">
                    <li>
                      <div ><a href="#", id = "li">Home </a></div>
                    </li>
                    <li><a href="userProduct.php", id = "li">Product </a></li>
                    <li> <a href="cart.php", id = "li">Cart </a></li>
                    <li> <a href="userAccount.php", id = "li">Account </a> </li>
                    <li><a href="home.php", id = "li">LogOut </a></li>
      </ul>
    </nav>
      		<?php echo $add; ?>
      		<div id="content_area">
            	<h1><?php echo $content; ?></h1>
        	</div>
   	  <footer>
      </footer>
    </div>
    </body>
</html>