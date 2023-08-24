<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<link href='../favicon.png' rel='shortcut icon' type='image/x-icon'>
<link rel='stylesheet' type='text/css' href='css/setup.css' />
<?php require_once('jquery.php');?>
<title>setup</title>
</head>

<body>
<div class='container'>
<!-- start content -->
<div id='content'>
<a href='#'><img src='images/setup_logo.png' /></a>
<?php 
switch($_GET['step'])
 {
		case 1:
		?>
		<!--  start step-holder -->
		<div id='step-holder'>
			<div class='step-no'>1</div>
			<div class='step-dark-left'><a href='<?php echo $_SERVER['PHP_SELF'];; ?>?step=1'>Add database</a></div>
			<div class='step-dark-right'>&nbsp;</div>
			<div class='step-no-off'>2</div>
			<div class='step-light-left'><a href='<?php echo $_SERVER['PHP_SELF'];; ?>?step=2'>Admin sign-up</a></div>
			<div class='step-light-round'>&nbsp;</div>
			<div class='clear'></div>
	</div>
			<!--  end step-holder -->
				<!-- start id-form -->
			<table border='0' cellpadding='0' cellspacing='0'  id='id-form'>
			<form action='<?php echo $_SERVER['PHP_SELF'];; ?>?step=2' enctype='multipart/form-data' method='post'>
			<tr>
				<th valign='top'>hostname:</th>
				<td><input type='text' name='hostname' class='inp-form' /></td>
				<td>Default host name is Localhost your host may differ</td>
			</tr>
			<tr>
				<th valign='top'>username:</th>
				<td><input type='text' name='db_uname' class='inp-form' /></td>
				<td>Your Mysql username default username root </td>
			</tr>
			<tr>
				<th valign='top'>password:</th>
				<td><input type='password' name='db_pass' class='inp-form' /></td>
				<td>Your Mysql password</td>
			</tr>
			<tr>
				<th valign='top'>Db name:</th>
				<td><input type='text' name='db_name' class='inp-form' /></td>
				<td>your database name to store the data</td>
			</tr>
			<tr>
				<th valign='top'>Db Prefix:</th>
				<td><input type='text' name='db_prefix' class='inp-form' /></td>
				<td>database prefix default Pm_</td>
			</tr>
			<tr>
			<th>&nbsp;</th>
			<td valign='top'>
				<input type='submit' value='' name='submit' class='form-submit'  onclick='return setup_validation();' />
			</td>
		</tr>
		</form>
		</table>
<?php
break;
case 2:
if(isset($_POST['submit']))
		{
		$hostname=$_POST['hostname'];
		$db_uname=$_POST['db_uname'];
		$db_pass=$_POST['db_pass'];
		$db_name=$_POST['db_name'];
		$db_prefix=$_POST['db_prefix'];
		$conn = mysql_connect($hostname,$db_uname,$db_pass);
		if (!$conn) {die('Could not connect: ' . mysql_error());}
		$sql = 'CREATE DATABASE '.$db_name;
		if (mysql_query($sql, $conn)) 
	    {
			//Dumping Schema Into Database
			ini_set('memory_limit', '5120M');
			set_time_limit ( 0 );
			require_once('sql_parser.php');
			
			$sql_schema= "-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 09, 2012 at 11:22 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `postme`
--

-- --------------------------------------------------------

--
-- Table structure for table `".$db_prefix."pages`
--

CREATE TABLE IF NOT EXISTS `".$db_prefix."pages` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(100) NOT NULL,
  `page_author` varchar(20) NOT NULL,
  `page_postition` varchar(10) NOT NULL,
  `page_status` int(1) NOT NULL,
  `page_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `".$db_prefix."pages`
--

INSERT INTO `".$db_prefix."pages` (`id`, `page_title`, `page_author`, `page_postition`, `page_status`, `page_created`) VALUES
(1, 'Home', 'PostMe', '', 0, '2012-07-09 23:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `".$db_prefix."posts`
--

CREATE TABLE IF NOT EXISTS `".$db_prefix."posts` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(100) NOT NULL,
  `post_desc` text NOT NULL,
  `post_author` varchar(20) NOT NULL,
  `post_type` varchar(20) DEFAULT NULL,
  `post_links` varchar(200) DEFAULT NULL,
  `parent_page` int(3) NOT NULL,
  `post_status` int(11) NOT NULL DEFAULT '0',
  `post_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `".$db_prefix."posts`
--

INSERT INTO `".$db_prefix."posts` (`id`, `post_title`, `post_desc`, `post_author`, `post_type`, `post_links`, `parent_page`, `post_status`, `post_created`) VALUES
(1, 'Sample Post', 'This Is a Sample Post.You Can delete this post bu using the Admin panel.', 'admin', NULL, NULL, 1, 0, '2012-07-09 23:21:03');

-- --------------------------------------------------------

--
-- Table structure for table `".$db_prefix."users`
--

CREATE TABLE IF NOT EXISTS `".$db_prefix."users` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) NOT NULL,
  `user_pass` varchar(64) NOT NULL,
  `display_name` varchar(25) NOT NULL,
  `first_name` tinytext,
  `last_name` tinytext,
  `user_email` varchar(50) NOT NULL,
  `user_web` varchar(25) DEFAULT NULL,
  `user_type` binary(1) NOT NULL DEFAULT '0',
  `profile_pic` varchar(50) NOT NULL DEFAULT 'images/defult_profile.png',
  `cover_pic` varchar(50) NOT NULL DEFAULT 'images/defult_cover.png',
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_login` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `".$db_prefix."users`
--


-- --------------------------------------------------------

--
-- Table structure for table `".$db_prefix."status`
--

CREATE TABLE IF NOT EXISTS `".$db_prefix."status` (
  `id` int(2) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `".$db_prefix."status`
--

INSERT INTO `".$db_prefix."status` (`id`, `status`) VALUES
(0, 'Published'),
(1, 'Unpublished'),
(2, 'Trashed');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
";
			$sql_query = remove_remarks($sql_schema);
			$sql_query = split_sql_file($sql_query, ';');
	
			mysql_select_db($db_name) or die('error database selection');
			foreach($sql_query as $sql){
			mysql_query($sql) or die('error in query');
		}
		
		//Creation Of MySql Configuration file
		$string = '<?php 
		$hostname = "'. $_POST["hostname"]. '";
		$db_uname = "'. $_POST["db_uname"]. '";
		$db_pass = "'. $_POST["db_pass"]. '";
		$db_name = "'. $_POST["db_name"]. '";
		$db_prefix = "'. $_POST["db_prefix"]. '";
		mysql_connect($hostname,$db_uname,$db_pass) or die ("error in connection". mysql_error());
		mysql_select_db($db_name) or die ("error in select database". mysql_error());
		?>';
		$config = fopen("pm-config.ini", "w");
		fwrite($config, $string);
		fclose($config);
		$data_path='../'.$db_prefix.'data';
		mkdir($data_path,777);
		mkdir($data_path.'/uploads',777);
		mkdir($data_path.'/uploads/profile',777);
		mkdir($data_path.'/uploads/cover',777);
			 
	} 
		
else 
 {
	echo 'Error creating database: ' . mysql_error() . "\n";
 }
		?>
		<!--  start step-holder -->
		<div id='step-holder'>
		  <div class='step-no-off'>1</div>
		  <div class='step-light-left'><a href='<?php echo $_SERVER['PHP_SELF'];; ?>?step=1'>Add database</a></div>
		  <div class='step-light-right'>&nbsp;</div>
		  <div class='step-no'>2</div>
		  <div class='step-dark-left'><a href='<?php echo $_SERVER['PHP_SELF'];; ?>?step=2'>Admin sign-up</a></div>
		  <div class='step-dark-round'>&nbsp;</div>
			<div class='clear'></div>
		</div>
		<!--  end step-holder -->
			<!-- start id-form -->
		<table border='0' cellpadding='0' cellspacing='0'  id='id-form'>
        <form action='<?php echo $_SERVER['PHP_SELF'];; ?>?step=3' enctype='multipart/form-data' method='post'>
		<tr>
			<th valign='top'>Site Title:</th>
			<td><input type='text' name='site_name' class='inp-form' /></td>
            <td>website name eg. yourname</td>
		</tr>
		<tr>
			<th valign='top'>username:</th>
			<td><input type='text' name='uname' class='inp-form' /></td>
			<td>admin username for manage website</td>
		</tr>
		<tr>
			<th valign='top'>password:</th>
			<td><input type='password' name='passwrd' class='inp-form' /></td>
            <td>admin account password</td>
		</tr>
        <tr>
			<th valign='top'>retype-password:</th>
			<td><input type='password' name='repasswrd' class='inp-form' /></td>
            <td>retype above password</td>
		</tr>
		<tr>
			<th valign='top'>E-mail:</th>
			<td><input type='text' name='email' class='inp-form' /></td>
            <td>admin email to send alerts</td>
		</tr>
        <tr>
		<th>&nbsp;</th>
		<td valign='top'>
			<input type='submit' value='submit' class='form-submit' onclick='return register_validation();'/>
		</td>
	</tr>
    </form>
	</table>
    <?php
		}
		break;
		case 3:
		//gives the uniq userid 
		$site_name=$_POST['site_name'];
		$username=$_POST['uname'];
		$password=md5($_POST['passwrd']);
		$retype_password=md5($_POST['repasswrd']);
		$email=$_POST['email'];
		require_once("pm-config.ini");
		if($password!=$retype_password)
		{
			echo 'email mismatch please try again...<br/>';
		}
		else
		{  
			 mysql_query("INSERT INTO ".$db_prefix."users (user_name, user_pass, display_name, user_email, user_type) 
			 			   VALUES ('".$username."', '".$password."', '".$site_name."', '".$email."', '1')");
			}
		?>
		
       <h1 align="center">Registration successful</h1>
       <a href='login.php'>Let's go to login page</a>
<?php
		break;
 }

?>

</div>

</div>
 
</body>
</html>
