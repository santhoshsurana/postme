<?php require_once('header.php');?>
<!--  start page-heading -->
	<div id="page-heading">
		<h1>PAGES</h1>
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
			
		<?php 
        switch($_GET['step'])
            {
		         case 1:
		                $page_id=$_GET['page_id'];
                        require_once('pm-config.ini');
                        mysql_query("UPDATE ".$db_prefix."pages SET page_status='2' WHERE id='$page_id'");?>
						<!--  start message-red -->
				        <div id="message-red">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							<tr>
							<td class="red-left">Page Trashed Successfully</a></td>
							<td class="red-right"><a class="close-red"><img src="images/icon_close_red.gif"   alt="" /></a></td>
							</tr>
						</table>
						</div>
						<!--  end message-red -->
						
				<?php break; 
				
				
			   
				case 2:
				        $page_id=$_GET['page_id'];
                        require_once('pm-config.ini');
                        mysql_query("UPDATE ".$db_prefix."pages SET page_status='1' WHERE id='$page_id'");?>
						<!--  start message-yellow -->
						<div id='message-yellow'>
						<table border='0' width='100%' cellpadding='0' cellspacing='0'>
							<tr>
							<td class='yellow-left'>Page UnPublished Successfully</a></td>
							<td class='yellow-right'><a class='close-yellow'><img src='images/icon_close_yellow.gif'   alt='' /></a></td>
							</tr>
						</table>
						</div>
						<!--  end message-yellow -->
				<?php break; 
				
				case 3:
				          
						     $page_id=$_GET['page_id'];
                             require_once('pm-config.ini');
                             mysql_query("UPDATE ".$db_prefix."pages SET page_status='0' WHERE id='$page_id'");?>
							<!--  start message-green -->
							<div id="message-green">
							<table border="0" width="100%" cellpadding="0" cellspacing="0">
								<tr>
									<td class="green-left">Page Published Successfully</td>
									<td class="green-right"><a class="close-green"><img src="images/icon_close_green.gif"   alt="" /></a></td>
								</tr>
							</table>
							</div>
				<!--  end message-green -->
				
				<?php break;  
			
			}  ?>
			
				
		
		 
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left "><a href="">S.No</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Page Name</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Author</a></th>
					<th class="table-header-repeat line-left"><a href="">Status</a></th>
					<th class="table-header-options line-left"><a href="">Created On</a></th>
					<th class="table-header-repeat line-left"><a href="">Options</a></th>
				</tr>
				<?php
				          require_once('pm-config.ini');
                          $result=mysql_query("SELECT id,page_title,page_author,page_status,page_created FROM ".$db_prefix."pages WHERE page_status!=2");
						  $i=1;
                          while($page=mysql_fetch_row($result))
						  {
						  $status=mysql_query("SELECT status from ".$db_prefix."status where id=$page[3]");
						  $sts=mysql_fetch_row($status);
				       echo"<tr>
					        <td><input  type='checkbox'/></td>
							<td>$i</td>
							<td><b>$page[1]</b></td>
							<td>$page[2]</td>
							<td>$sts[0]</td>
							<td>$page[4]</td>
							<td class='options-width'>
								<a href='pages.php?step=3&page_id=$page[0]' title='Publish' class='icon-1 info-tooltip'></a>
								<a href='pages.php?step=2&page_id=$page[0]' title='Unpublish' class='icon-2 info-tooltip'></a>
								<a href='page_edit.php?' title='Edit' class='icon-3 info-tooltip'></a>
								<a href='pages.php?step=1&page_id=$page[0]' title='Trash' class='icon-4 info-tooltip'></a>
							</td>
						   </tr> ";
						   $i++;
				          }
				?>
			
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			<div id="actions-box">
				<a href="" class="action-slider"></a>
				<div id="actions-box-slider">
					<a href="" class="action-edit">Edit</a>
					<a href="" class="action-delete">Delete</a>
				</div>
				<div class="clear"></div>
			</div>
			<!-- end actions-box........... -->
			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				<a href="" class="page-far-left"></a>
				<a href="" class="page-left"></a>
				<div id="page-info">Page <strong>1</strong> / 15</div>
				<a href="" class="page-right"></a>
				<a href="" class="page-far-right"></a>
			</td>
			<td>
			<select  class="styledselect_pages">
				<option value="">Number of rows</option>
				<option value="">1</option>
				<option value="">2</option>
				<option value="">3</option>
			</select>
			</td>
			</tr>
			</table>
			<!--  end paging................ -->
			
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
<?php require_once('footer.php');?>