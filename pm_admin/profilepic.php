<?php

if(isset($_POST['submit']))
{
	if($_FILES['file']['type'] == 'image/gif')
	{ $type='.gif';}
	elseif($_FILES['file']['type'] == 'image/png')
	{ $type='.png';}
	elseif($_FILES['file']['type'] == 'image/jpeg')
	{ $type='.jpeg';}
	elseif($_FILES['file']['type'] == 'image/jpg')
	{ $type='.jpg';}
require_once('pm-config.ini');
$name=$db_prefix.$type;

	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/png"))
	&& ($_FILES["file"]["size"] < 20000000))
	{
	if ($_FILES["file"]["error"] > 0)
		{
		echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
		}
	else	
		{
		if (file_exists("../".$db_prefix."data/uploads/profile/" . $_FILES["file"]["name"]))
		{	
		echo $_FILES["file"]["name"] . " already exists. ";
		}
		else
		{
      move_uploaded_file($_FILES["file"]["tmp_name"],"../".$db_prefix."data/uploads/profile/".$name."");
	  $upload_path=("../".$db_prefix."data/uploads/profile/".$name."");
	  mysql_query("UPDATE  ".$db_prefix."users SET  profile_pic='$upload_path' WHERE  id=1");
	  header('location:../pm_admin/profilepic.php?p=5&c=1');
      }
    }
  }
else
  {
  echo "Invalid file";
  }
  }
else
{
?>
<?php include"header.php";?>
<!--  start page-heading -->
	<div id="page-heading">
		<h1>Change Profile Picture</h1>
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
		<form method='post' action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
	<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Select picture:</th>
			<td valign="top"><input  type="file" name="file" id="file"  class="inp-form" ></td>
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