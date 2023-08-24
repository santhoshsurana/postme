<?php 
if(isset($_POST['submit']))
{
require_once('pm-config.ini');
session_start();
$page_id=$_POST['page_id'];
$title = $_POST['title'];
$desc = $_POST['desc'];
$author=$_SESSION['username'];
mysql_query("INSERT INTO ".$db_prefix."posts(post_title,post_desc,post_author,parent_page) values('$title','$desc','$author','$page_id')");
header("location:posts.php");
}
else
{
?>
 <?php include"header.php";?>
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
			  
				<form method='post' action="<?php $_SERVER['PHP_SELF'];?>">
					<table border='0' cellpadding='0' cellspacing='0'  id='id-form'>
						<tr> 
                        <th valign="top">Selecete Page</th>
						<td><select name='page_id' class="styledselect_form_1">
							<?php
								require_once('pm-config.ini');
								$result=mysql_query("SELECT id,page_title FROM ".$db_prefix."pages WHERE page_status!=2");
								while($value=mysql_fetch_row($result))
									{
									echo"<option value=$value[0]>$value[1]</option>";
									}
							?>
						</select></td></tr>
						<tr><th valign="top">Post Title:</th>
							<td><input  name="title"  cols="50" class='inp-form'></input></td>
                            <td></td>
						</tr>
						<tr><th valign="top">Post Description:</th>
								<td valign="top"><textarea  name="desc" rows="20" cols="50" class='form-textarea' ></textarea></td>
                                <td></td>
						</tr>

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