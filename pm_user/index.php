<?php require_once("header.php"); ?>

		  <?php
		 if(!isset($_GET["page_id"]))
          {
		 $page_id = "1";
		 }
            else {$page_id=$_GET['page_id'];}
		 
		       
			   require_once("../pm_admin/pm-config.ini");
			   $posts=mysql_query("SELECT post_title,post_desc,post_author,post_created  FROM ".$db_prefix."posts where parent_page='$page_id' AND post_status=0 ORDER BY post_created DESC");
			   while($post=mysql_fetch_row($posts))
			   {
         	   echo"<h1>$post[0]</h1>
                <p class='post'>$post[1]</p>
                <p class='postmeta'><a href='index.php' class='user'>$post[2]</a> |<a href='index.html' class='comments'>Comments (0)</a> |	<span class='date'>$post[3]</span>	
			    </p>";
			   }
            ?>
         </div>
 <?php require_once"footer.php"; ?>