<?php 
//Connects to your Database 
 mysql_connect("mysql4.000webhost.com", "a3712066_project", "qwer1234") or die(mysql_error()); 
 mysql_select_db("a3712066_project") or die(mysql_error()); 



 //Checks if there is a login cookie
 if(isset($_COOKIE['ID_my_site']))


 //if there is, it logs you in and directes you to the members page
 { 
 	$username = $_COOKIE['ID_my_site']; 

 	$pass = $_COOKIE['Key_my_site'];

 	 	$check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());

 	while($info = mysql_fetch_array( $check )) 	

 		{

 		if ($pass != $info['password']) 

 			{

 			 			}

 		else

 			{

 			header("Location: members.php");



 			}

 		}

 }


 //if the login form is submitted 

 if (isset($_POST['submit'])) { // if form has been submitted



 // makes sure they filled it in

 	if(!$_POST['username'] | !$_POST['pass']) {

 		die('You did not fill in a required field.');

 	}

 	// checks it against the database



 	if (!get_magic_quotes_gpc()) {

 		$_POST['email'] = addslashes($_POST['email']);

 	}

 	$check = mysql_query("SELECT * FROM users WHERE username = '".$_POST['username']."'")or die(mysql_error());



 //Gives error if user dosen't exist

 $check2 = mysql_num_rows($check);

 if ($check2 == 0) {

 		die('That user does not exist in our database. <a href=index.php>Click Here to Register</a>');

 				}

 while($info = mysql_fetch_array( $check )) 	

 {

 $_POST['pass'] = stripslashes($_POST['pass']);

 	$info['password'] = stripslashes($info['password']);

 	$_POST['pass'] = md5($_POST['pass']);



 //gives error if the password is wrong

 	if ($_POST['pass'] != $info['password']) {

 		die('Incorrect password, please try again.');

 	}
 else 

 { 

 
 // if login is ok then we add a cookie 

$_POST['username'] = stripslashes($_POST['username']); 
$hour = time() + 3600; 
setcookie(ID_my_site, $_POST['username'], $hour); 
setcookie(Key_my_site, $_POST['pass'], $hour);	 
 
//then redirect them to the members area 
header("Location: members.php"); 
 } 
} 
} 

else 

{	 

 

 // if they are not logged in 

 ?> 

<head>

<link rel='stylesheet' href='registration.css'>


</head>

<body background='reg.jpg'>
 


 <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 

<div id='header' class='container'>

	<div id='logo'>

		<center><h1><font face='Verdana' size='20' color='white' align=>Full Play</font></h1></center>

	</div>


<section class="container">
    <div class="login">
 <center><table border="0"> 


 <h1>Login</h1> 

 

<input type="text" name="username" maxlength="40" placeholder="Username"> 
 

 

 

 <input type="password" name="pass" maxlength="50" placeholder="Password"> 

  

 <tr><td colspan="2" align="right"> 

<br />

 <input type="submit" name="submit" value="Login"> 

 </td></tr> 

 </table></center></div></section> 

 </form> 

<center><p><font face="Verdana" size="4" color="white">If not registered - you may now <a href="/index.php">register here</a>.</font></p></center>


</body>


 <?php 

 } 

 

 ?> 
