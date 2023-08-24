<?php
// Shows we are using sessions
session_start(); 
if(isset($_POST['submit']))
{
	require_once('pm-config.ini');
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$time = time();
	$remember_me=$_POST['rem'];
	$user_details = mysql_query("SELECT * FROM ".$db_prefix."users WHERE user_name=\"$username\" AND user_pass=\"$password\"");
	$count=mysql_num_rows($user_details);
	if($count==1) 
	{ // If the username and password are correct do the following;
		$_SESSION['username'] = $_POST['username']; // Sets the session 'loggedin' to 1
		if(!empty($remember_me)) {
		// Check to see if the 'setcookie' box was ticked to remember the user
		setcookie("rem[username]", $username, $time + 3600); // Sets the cookie username
		setcookie("rem[password]", $password, $time + 3600); // Sets the cookie password
		}
		header('Location:posts.php'); // Forwards the user to this URL
		exit();
	}
	else // If login is unsuccessful forwards the user back to the index page with an error
	{
	header('Location:login.php');
	exit();
	}
}
elseif(isset($_COOKIE['rem']))
// If the cookie 'rem is set, do the following;
{
	require_once('pm-config.ini');
	$username = $_COOKIE['rem']['username'];
	// Select the username from the cookie
	$password = $_COOKIE['rem']['password'];
	// Select the password from the cookie
	$user_details = mysql_query("SELECT * FROM ".$db_prefix."users WHERE user_name=\"$username\" AND user_pass=\"$password\"");
	$count=mysql_num_rows($user_details);
	if($count==1) 
	// If the login information is correct do the following;
	{
		$_SESSION['username'] = $_POST['username'];
		// Set the session 'loggedin' to 1 and forward the user to the admin page
		header('Location: index.php');
		exit();
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<title>Login</title>
<link rel='stylesheet' href='css/screen.css' type='text/css' media='screen' title='default'>
<link href='../favicon.png' rel='shortcut icon' type='image/x-icon'>
<!--  jquery core -->
<script src='js/jquery/jquery-1.4.1.min.js' type='text/javascript'></script>
<!-- Custom jquery scripts -->
<script src='js/jquery/custom_jquery.js' type='text/javascript'></script>
<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src='js/jquery/jquery.pngFix.pack.js' type='text/javascript'></script>
<script type='text/javascript'>
$(document).ready(function(){
$(document).pngFix( );
});
function login_validation()
{
  if(document.forms[0].elements["username"].value=="")
   {
			alert("Please Enter Username");
			document.forms[0].elements["username"].focus();
			return false;
   }

  if(document.forms[0].elements["password"].value=="")
   {
			alert("Please Enter your Password");
			document.forms[0].elements["password"].focus();
			return false;
   }
 return true;
}
</script>
</head>
<body id='login-bg'> 
 
<!-- Start: login-holder -->
<div id='login-holder'>

	<!-- start logo -->
	<div id='logo-login'>
		<img src="images/logo.png" />
	</div>
	<!-- end logo -->
	
	<div class='clear'></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id='loginbox'>
	
	<!--  start login-inner -->
	<div id='login-inner'>
    
		<table border='0' cellpadding='0' cellspacing='0'>
        <form action='<?php $_SERVER['PHP_SELF'];?>' enctype='multipart/form-data'  method='post'>
		<tr>
			<th>Username</th>
			<td><input type='text'  name='username' onfocus='this.value=''' class='login-inp'></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type='password' name='password'  onfocus='this.value=''' class='login-inp'></td>
		</tr>
		<tr>
			<th></th>
			<td valign='top'><input type='checkbox' name='rem' value='rem' class='checkbox-size' id='login-check'><label for='login-check'>Remember me</label></td>
		</tr>
		<tr>
			<th></th>
			<td><input type='submit' name='submit' class='submit-login' onclick='return login_validation();'></td>
		</tr>
        </form>
		</table>

	</div>
 	<!--  end login-inner -->
	<div class='clear'></div>
    <a href='' class='sign-up'>Not a member yet?</a>
	<a href='' class='forgot-pwd'>Forgot Password?</a>
 	</div>
 <!--  end loginbox -->
 
	<!--  start forgotbox ................................................................................... -->
	<div id='forgotbox'>
		<div id='forgotbox-text'>Please send us your email and we'll reset your password.</div>
		<!--  start forgot-inner -->
		<div id='forgot-inner'>
		<table border='0' cellpadding='0' cellspacing='0'>
        <form action='forgot.php' enctype='multipart/form-data'  method='post'>
		<tr>
			<th>Email address:</th>
			<td><input type='text' value='' name='email'  class='login-inp'></td>
		</tr>
		<tr>
			<th> </th>
			<td><input type='submit' class='submit-login'></td>
		</tr>
        </form>
		</table>
		</div>
		<!--  end forgot-inner -->
		<div class='clear'></div>
		<a href='' class='back-login'>Back to login</a>
	</div>
	<!--  end forgotbox -->

</div>
<!-- End: login-holder -->
</body>
</html>