<?php 
if(isset($_POST['submit']))
{
session_start();
$author=$_SESSION['username'];
$page_name=$_POST['page_name'];
require_once('pm-config.ini');
mysql_query("INSERT INTO ".$db_prefix."pages(page_title,page_author) VALUES('$page_name','$author')");
header('location:pages.php');
}
else
{
?>
<?php include"header.php";?>
<!--  start page-heading -->
	<div id="page-heading">
		<h1>Add page</h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="images/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="images/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
		<form method='post' action="<?php $_SERVER['PHP_SELF'];?>">
	<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Page Name:</th>
			<td valign="top"><input  type="text" class="inp-form" name="page_name" maxlength="50" size="30"></td>
			<td>&nbsp;</td>
		</tr>
        <tr>
        	<th>&nbsp;</th>
			<td valign="top"><input type="submit" name="submit" class="form-submit" /></td>
		<td></td>
	</table>
		</form> 
        </div>
			<!--  end table-content  -->
	
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

<?php
}
?>
<?php include"footer.php";?>