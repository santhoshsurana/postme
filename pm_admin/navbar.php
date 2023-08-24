
<!--  start nav-outer-repeat................................................................................................. START -->
<div class='nav-outer-repeat'> 
<!--  start nav-outer -->
<div class='nav-outer'> 

		<!-- start nav-right -->
		<div id='nav-right'>
		
			<div class='nav-divider'>&nbsp;</div>
			
			
			<a href='logout.php' id='logout'><img src='images/nav_logout.gif' width='64' height='14' alt='' /></a>
			<div class='clear'>&nbsp;</div>
		
			
		
		</div>
		<!-- end nav-right -->
		<!--  start nav -->
		<div class='nav'>
		<div class='table'>
<?php 

if(isset($_GET['p']))
{
$page=$_GET['p'];
}else{
$page=0;
}
if(isset($_GET['c']))
{
$child=$_GET['c'];
}else{
$child=0;
} 	?>	
		
		
		<div class='nav-divider'>&nbsp;</div>
		                    
		<ul class='<?php if($page==1){ echo 'current';} else{echo 'select';}?>'><li><a href='posts.php?p=1'><b>Posts</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class='select_sub show'>
			<ul class='sub'>
				<li class='<?php if($page==1 && $child==1){ echo 'sub_show';}?>'><a href='post_add.php?p=1&c=1'>Add post</a></li>
				
				
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class='nav-divider'>&nbsp;</div>
		
		<ul class='<?php if($page==2){ echo 'current';} else{echo 'select';}?>'><li><a href='pages.php?p=2'><b>Pages</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class='select_sub show'>
			<ul class='sub'>
				<li class='<?php if($page==2 && $child==1){ echo 'sub_show';}?>'><a href='page_add.php?p=2&c=1'>Add page</a></li>
				<li class='<?php if($page==2 && $child==2){ echo 'sub_show';}?>'><a href='page_edit.php?p=2&c=2'>Edit page</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class='nav-divider'>&nbsp;</div>
		
		
		
     
		
		
		
		<ul class='<?php if($page==5){ echo 'current';} else{echo 'select';}?>'><li><a href='?p=5'><b>Personalize</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class='select_sub show'>
			<ul class='sub'>
				<li class='<?php if($page==5 && $child==1){ echo 'sub_show';}?>'><a href='profilepic.php?p=5&c=1'>Change ProfilePic</a></li>
				<li class='<?php if($page==5 && $child==2){ echo 'sub_show';}?>'><a href='coverpic.php?p=5&c=2'>Change cover pic</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
        
		<div class='nav-divider'>&nbsp;</div>
		
		<ul class='<?php if($page==6){ echo 'current';} else{echo 'select';}?>'><li><a href='trash.php?p=6'><b>Trash</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
        </ul>
		
		<div class='nav-divider'>&nbsp;</div>
		<ul class='<?php if($page==7){ echo 'current';} else{echo 'select';}?>'><li><a href='../pm_user/index.php' TARGET='blank'><b>View Site</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
        </ul>
		<div class='clear'></div>
		</div>
		<div class='clear'></div>
		</div>
		<!--  start nav -->
</div>
<div class='clear'></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->
 
 <div class='clear'></div>