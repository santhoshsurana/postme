<?php include"access.php"; 
	  include"header.php";?>
    <!--  start page-heading -->
	<div id="page-heading">
		<h1>Dashboard</h1>
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
				if(isset($_POST['submit']))
				{
				//include Zend Gdata Libs  
				require_once("Zend/Gdata/ClientLogin.php");  
				require_once("Zend/Gdata/HttpClient.php");  
				require_once("Zend/Gdata/YouTube.php");  
				require_once("Zend/Gdata/App/MediaFileSource.php");  
				require_once("Zend/Gdata/App/HttpException.php");  
				require_once('Zend/Uri/Http.php');  
				  
				//yt account info  
				$yt_user = 'user@host.com'; //youtube username or gmail account  
				$yt_pw = '*********'; //account password  
				$yt_source = 'source'; //name of application (can be anything)  
				  
				//video path  
				$video_url = '/full/path/to/video';  
				  
				//yt dev key  
				$yt_api_key = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'; //your youtube developer key  
				  
				//login in to YT  
				$authenticationURL= 'https://www.google.com/youtube/accounts/ClientLogin';  
				$httpClient = Zend_Gdata_ClientLogin::getHttpClient(  
														  $username = $yt_user,  
														  $password = $yt_pw,  
														  $service = 'youtube',  
														  $client = null,  
														  $source = $yt_source, // a short string identifying your application  
														  $loginToken = null,  
														  $loginCaptcha = null,  
														  $authenticationURL);  
				
				
				  
				$yt = new Zend_Gdata_YouTube($httpClient, $yt_source, NULL, $yt_api_key);  
				  
				$myVideoEntry = new Zend_Gdata_YouTube_VideoEntry();  
				  
				$filesource = $yt->newMediaFileSource($video_url);  
				  
				$myVideoEntry = new Zend_Gdata_YouTube_VideoEntry();
				
				$Title=$_POST['Title'];
				$Desc=$_POST['Desc'];
				$Tags=$_POST['Tags'];
				$myVideoEntry->setVideoTitle($Title);
				$myVideoEntry->setVideoDescription($Desc);
				$myVideoEntry->setVideoCategory('Film');
				$myVideoEntry->setVideoPrivate();
				$myVideoEntry->SetVideoTags($Tags);
				
				
				$tokenHandlerUrl = 'http://gdata.youtube.com/action/GetUploadToken';
				$tokenArray = $yt->getFormUploadToken($myVideoEntry, $tokenHandlerUrl);
				$tokenValue = $tokenArray['token'];
				$postUrl = $tokenArray['url'];
				
				
				$uploadUrl = "http://uploads.gdata.youtube.com/feeds/users/$yt_user/uploads"; 
				// place to redirect user after upload
				$nextUrl = 'http://www.postme.com';
				
				// build the form
				$form = '<form id="youtube_upload" action="'. $postUrl .'?nexturl='. $nextUrl .
						'" method="post" enctype="multipart/form-data" target="uploader">'. 
						'<input id="file_upload" name="file_upload" type="file"/>'. 
						'<input name="token" type="hidden" value="'. $tokenValue .'"/>'.
						'<input value="upload" type="submit" />'. 
						'</form><iframe id="uploader" name="uploader" style="display: none; width: 500px; height: 200px; border:1px solid #000;"></iframe>';
				
				echo $form;  
				
				try {
					$control = $myVideoEntry->getControl();
				} catch (Zend_Gdata_App_Exception $e) {
					echo $e->getMessage();
				}
				
				if ($control instanceof Zend_Gdata_App_Extension_Control) {
					if ($control->getDraft() != null &&
						$control->getDraft()->getText() == 'yes') {
						$state = $myVideoEntry->getVideoState();
				
						if ($state instanceof Zend_Gdata_YouTube_Extension_State) {
							print 'Upload status: '
								  . $state->getName()
								  .' '.  $state->getText();
						} else {
							print 'Not able to retrieve the video status information'
								  .' yet. ' . "Please try again shortly.\n";
						}
					}
				}
				}
				else{
				?>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
					<table border='0' cellpadding='0' cellspacing='0'  id='id-form'>
						<tr><th valign="top">Video Title:</th>
							<td><input  name="Title" type="text"  cols="50" class='inp-form' /></td>
                            <td></td>
						</tr>
                        <tr><th valign="top">Description:</th>
							<td><input  name="Desc" type="text"  cols="50" class='inp-form'></td>
                            <td></td>
						</tr>
                        <tr><th valign="top">Tags:</th>
							<td><input  name="Tags" type="text"  cols="50" class='inp-form'></td>
                            <td></td>
						</tr>
						<tr>
                        <th>&nbsp;</th>
                        <td colspan="2" style="text-align:center"><input type="submit" name="submit" class='form-submit'></td>
                        <td></td></tr>
					</table>
                  </form>
						
				<?php }?>		
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
<?php include"footer.php";
?>