<?php 
if(isset($_POST['submit']))
{
$page_id=$_POST['page_id'];
$new_page_name=$_POST['new_page_name'];
require_once('pm-config.ini');
mysql_query("UPDATE ".$db_prefix."pages SET page_title='$new_page_name' WHERE id='$page_id'");
header('location:pages.php');
}
else
{
?>
   <?php include"header.php";?>
   <!--  start page-heading -->
	<div id="page-heading">
   	<h1>Edit Page</h1>
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
             <th valign="top">Select Page:</th>
             <td><select class="styledselect_form_1" name='page_id'>
                        <?php
                          require_once('pm-config.ini');
                          $result=mysql_query("SELECT id,page_title FROM ".$db_prefix."pages");
                          while($value=mysql_fetch_row($result))
                              {
                              echo"<option value=$value[0]>$value[1]</option>";
	                           }
	                    ?>
     </select></td></tr>
	 <tr>
					<th valign="top">New Name:</th>
					<td valign="top"><input  type="text" name="new_page_name" class='inp-form' maxlength="50" size="30"></td>
                    <td></td></tr>
					<tr >
                    <th>&nbsp;</th>
                    <td align="center" colspan='2'><input type="submit" name="submit" class='form-submit'/></td>
                    <td></td>
                    </tr>
				</tr>
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
	<?php require_once("footer.php"); ?>
	<?php
	}
	?>