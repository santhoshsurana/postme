<?php 
	if (file_exists('pm_admin/pm-config.ini'))
	{
  
	  header('Location: pm_user/index.php');
		
	}
	else
	{	
		header('Location: pm_admin/setup.php?step=1');
	}
?>