<?php 
	$email=$_POST['email'];
	require_once("../pm_admin/pm-config.ini");
	$forgot=mysql_query("SELECT user_name FROM ".$db_prefix."users WHERE ");
?>