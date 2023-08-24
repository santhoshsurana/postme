<?php 
require_once("../pm_admin/pm-config.ini");
session_start();
$user_details=mysql_query("SELECT display_name, profile_pic, cover_pic FROM ".$db_prefix."users");
while($user=mysql_fetch_row($user_details))
{
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href='../favicon.png' rel='shortcut icon' type='image/x-icon'>
<title>Welcome to <?php echo $user[0]; ?></title>
</head>
<body>
	<div class="container">
      <div class="header">			<!-- header start-->
         	<div class="cover-pic"> 
        		<img src="<?php echo $user[2]; ?>" width="1000" height="300" align="absmiddle" />
			
             <div class="user-pic">	
		<!-- user picture start-->
				<img align='absmiddle' src='<?php echo $user[1]; ?>' height='150px' width='150px'  />
             </div>		</div>				<!-- cover End-->
            <div class="user-name">				<!-- username start-->
			<p><?php echo $user[0]; ?></p>
            </div>						<!-- username end-->
           						<!-- user picture start-->
      </div>							<!-- header end-->
<?php 
}
?>	  
	  <!-- MenuBar Start-->
           <div class="menu">
            <ul>
			<?php
			   require_once("../pm_admin/pm-config.ini");
			   $pages=mysql_query("SELECT id,page_title FROM ".$db_prefix."pages WHERE page_status=0" );
			   
			   while($menu=mysql_fetch_row($pages))
				{
					echo"<li><a href='index.php?page_id=$menu[0]'>$menu[1]</a></li>";
				}
			?>
            </ul>
         </div>
<!-- MenuBar End-->
<div class="content">
