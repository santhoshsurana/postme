<?php 

if(isset($_POST['submit']))
{
require_once('pm-config.ini');
session_start();
$post_id=$_POST['post_id'];
$title = $_POST['title'];
$desc = $_POST['desc'];


$author=$_SESSION['username'];
mysql_query("UPDATE  ".$db_prefix."posts SET  `post_title` =  '$title',`post_desc` =  '$desc' WHERE  id =$post_id;");
header("location:posts.php");
}
else
{
?>
 <?php include"header.php";?>
 
 <?php $post_id=$_GET['post_id'];
 require_once('pm-config.ini');
 $result=mysql_query("Select post_title,post_desc,id from ".$db_prefix."posts WHERE id=$post_id");
 $row=mysql_fetch_row($result);

 ?>
 <!--  start page-heading -->
	<div id="page-heading">
		<h1>New Post</h1>
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
			  
				<form method='post' action="post_edit.php">
					<table border='0' cellpadding='0' cellspacing='0'  id='id-form'>
						
						<?php echo"
						<tr><th valign='top'>Id:</th>
								<td valign='top'><input   type='text' name='post_id' class='inp-form' maxlength='50' size='30' value='$row[2]'>			 
			   </td>
                                <td></td>
						</tr>
						<tr><th valign='top'>Title:</th>
								<td valign='top'><input   type='text' name='title' class='inp-form' maxlength='50' size='30' value='$row[0]'>			 
			   </td>
                                <td></td>
						</tr>
						<tr><th valign='top'>Post:</th>
								<td valign='top'><textarea  name='desc' rows='20' cols='50' class='form-textarea'>$row[1]		 
			   </textarea></td>
                                <td></td>
						</tr>"; ?>

						<tr>
                        <th>&nbsp;</th>
                        <td colspan="2" style="text-align:center"><input type="submit" name="submit" class='form-submit'></td>
                        <td></td></tr>
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
    
                
	<?php include"footer.php";?>
<?php
}
?>