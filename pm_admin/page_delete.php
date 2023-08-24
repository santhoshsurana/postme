<?php 

if(isset($_POST['submit']))
{
$page_id=$_POST['page_id'];
require_once('pm-config.ini');
mysql_query("DELETE FROM ".$db_prefix."pages WHERE id='$page_id'");
header('location:index.php');

}
else
{
?>
   <?php 
    
	include"header.php";
	?>
   <h1>Delete Page</h1>
    <form method='post' action="<?php $_SERVER['PHP_SELF'];?>">
             <table width='600' align='center'  border='0'>
             <tr> <td valign="top" width="200">
            <label for="select Page">Selecete Page</label>
              </td><td><select name='page_id'>
                        <?php
                          require_once('pm-config.ini');
                          $result=mysql_query("SELECT id,page_title FROM ".$db_prefix."pages");
                          while($value=mysql_fetch_row($result))
                              {
                              echo"<option value=$value[0]>$value[1]</option>";
	                           }
	                    ?>
     </select></td></tr>
					<tr ><td align="center" colspan='2'><input type="submit" name="submit" value="DELETE PAGE"/></td></tr>
				
	</table> 
	</form>
	<?php require_once("footer.php"); ?>
	<?php
	}
	?>