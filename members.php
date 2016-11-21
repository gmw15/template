<?php 
//Connects to your Database 
 mysql_connect("mysql4.000webhost.com", "a3712066_project", "qwer1234") or die(mysql_error()); 
 mysql_select_db("a3712066_project") or die(mysql_error()); 

 
 //checks cookies to make sure they are logged in 

 if(isset($_COOKIE['ID_my_site'])) 

 { 

 	$username = $_COOKIE['ID_my_site']; 

 	$pass = $_COOKIE['Key_my_site']; 

 	 	$check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error()); 

 	while($info = mysql_fetch_array( $check )) 	 

 		{ 

 

 //if the cookie has the wrong password, they are taken to the login page 

 		if ($pass != $info['password']) 

 			{ 			header("Location: login.php"); 

 			} 


 //otherwise they are shown the admin area	 

 	else 

 			{ 

			
 

 echo " <!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' type='text/css' href='css/style.css'>
</head>
<body>

	<div class='container'>

		<header>
		   <h1>Weekly Assignment</h1>
		</header>
  
		<nav>
		  <ul>
			<li><a href='#'>Profile</a></li>
			<li><a href='#'>Current Work</a></li>
			<li><a href='#'>Showcase</a></li>
			<li><a href='#'>Module Archive</a></li>
			<li><a href='logout.php'>Logout</a></li>
		  </ul>
		</nav>

		<div id='mainContent'>
		  <h1>Header 1</h1>
		  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy 
		  text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		  It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
		  It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with 
		  desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		  
		  <img src='image/placeholder.png' alt='image' style='width:509px;height:305px;'>
		  
		</div>

		<footer>Copyright © Glen Ward</footer>

	</div>

</body>
</html>

 "; 

 echo ""; 

 			} 

 		} 

 		} 

 else 

 

 //if the cookie does not exist, they are taken to the login screen 

 {			 

 header("Location: login.php"); 

 } 

 ?> 
