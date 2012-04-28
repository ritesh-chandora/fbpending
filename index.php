<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Zion Narrows  
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20102110

-->
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>

			<meta name="google-site-verification" content="HWsEJtzpRoAg59TT4cWgeI8aA6-HvRnw6StbzTxODu8" />
			<meta name="description" content="An Application for Find Your Pending (or unaccepted) Friend Requests in Facebook" />
			<meta name="keywords" content="Facebook Application,Pending Friend Request,Ritesh Chandora,unaccepted Friend Request" />
			<meta name="author" content="Ritesh Chandora" />
			<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
			<meta property="og:title" content="Find Your Pending Friend Request developed by Ritesh Chandora Version 3.0" />
			<meta property="og:description" content="An Application for Find Your Pending (or unaccepted) Friend Requests in Facebook" />
			<meta property="og:image" content="http://andromeda.nitc.ac.in/~ritesh/fbpending/images/fbpendinglogo.png" />
			<meta property="og:url"	content="http://andromeda.nitc.ac.in/~ritesh/fbpending/">
			<link rel="shortcut icon" type="image/x-icon" href="images/icon.png" media="screen" />
			<link rel="stylesheet" href="css/main.css" type="text/css" />
		
			<script type="text/javascript" src="javascript/jquery.js"></script>
			<script type="text/javascript" src="javascript/javascript.js"></script>
			<script type="text/javascript" src="javascript/googlestats.js"></script>
			<title>Find Your Pending Friend Request developed by Ritesh Chandora Version 3.0</title>
	</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=201415399962503";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php
	@session_start();
	//$_SESSION['name']= "ritesh chandora";
	require 'src/facebook.php';
// I include my application id and secret key using appdetails file.
// use your details and commmet this include function
	include('appdetails.php');

/*	$facebook = new Facebook(array(
	  'appId'  => 'Your Application ID',
	  'secret' => 'Your Application Secret code',
	  'cookie' => true,
	));
*/
	$user = $facebook->getUser();
	//echo "value of user".$user;
	if ($user) {
	  try {
	    $user_profile = $facebook->api('/me');
	    $_SESSION['user_profile']=$user_profile;
	  } catch (FacebookApiException $e) {
	    error_log($e);
	    $user = null;
	  }
	}


	if ($user) {
	//echo "saala login h..";
	  $logoutUrl = $facebook->getLogoutUrl();
	 // die();
	//header("include :","http://www.google.com");
	}
	 else 
	{
	//echo "logout h ";
	//header("include :","http:\/\/andromeda.nitc.ac.in\/~ritesh\/fbpending\/");
	//$params = array('scope' => 'user_location,user_location,friends_location,friends_location,friends_birthday,user_relationship_details,friends_relationship_details,user_about_me	friends_about_me,user_hometown,friends_hometown,user_location,friends_location,user_relationships,friends_relationships,user_photos,friends_photos');
	$params = array('scope' => 'publish_stream,email');
	
	$loginUrl = $facebook->getLoginUrl($params);
	//echo $loginUrl;


	?>

<div id="wrapper">
	<div id="header">
		<div id="logo">
			<img style="opacity:.9; float:left; height:80px; width:350px;" src="images/fbpendinglogo.png">
			<h1>Find Pending Requests</h1>
			<p>design by <a href="http://www.facebook.com/ritesh.chandora">Ritesh Chandora</a></p>
		</div>
		<!--<div id="search">
			<form method="get" action="">
				<fieldset>
				<input type="text" name="s" id="search-text" size="15" />
				<input type="submit" id="search-submit" value="GO" />
				</fieldset>
			</form>
		</div>-->
	</div>
	<!-- end #header -->
	<div id="menu">
				<ul class="mainlink">
				<!--<li> <div class="anchor1" id="home"><b><a class="anchor1" href="index.php">HOME</a></b></div></li>
				<li> <div class="anchor1" id="moreapp"><b>MORE APPs</b></div></li>
				<li> <div class="anchor1" id="contact"><b>CONTACTS</b></div></li>
				<li> <div class="anchor1" id="termofuse"><b>TERMS OF USE</b></div></li>
				-->
					
					<li><a class="anchor" href="index.php">HOME</a></li>
					<li><a class="anchor" id="moreapp" >MORE APPs</a></li>
					<li><a class="anchor" id="contact">ABOUT ME</a></li>
					<li><a class="anchor" id="termofuse">TERMS OF USE</a></li>
				
				</ul>
	</div>
	<!-- end #menu -->
	<div id="page">
	<div id="page-bgtop">
	<div id="page-bgbtm">
		<div id="content">
			<div class="post">
				<h2 class="title"><a href="#">Welcome to Facebook Pending Request Application   </a></h2>
				<div class="entry"><span class="result2"></span>
									<div class="level4_content">
		
					
<h2 style="margin:40px 40px 0px 40px; ">
	<span style="color:#000033;"><span style="font-family:trebuchet ms,helvetica,sans-serif;">Hello Friend,</span></span></h2> <br />
<p style="margin:0px 40px 0px 40px; text-align: justify; ">
	<span style="color:#696969;"><span style="font-family:comic sans ms,cursive;"><span style="font-size:16px;">Some times we send a lot of Friend Requests to people and wait for their approval. But some people don&#39;t accept our request and&nbsp;</span><span style="font-size: 16px; ">just&nbsp;ignore it, If you are inquisitive and want to know how many of your requests are either pending or have not been accepted, you simply cannot, since Facebook does not provide any such facility. It is the lack of such a feature that has inspired me to develop this application, that lets you find out which friends have yet to accept or have completely ignored the requests that you sent them on Facebook.</span></span></span></p> <br /> 
<h3 style="text-align: center; ">
	<span style="font-family:courier new,courier,monospace;"><span style="font-family:georgia,serif;"><span style="font-size: 16px; "><span style="color:#000033;">Here is Cool App to find how many requests you have pending.</span><br />
	

	<span class="startlink"><a id="temp"href="<?php echo $loginUrl;?>"><img src="images/enter.png"></span><br>
	<span style="font-family:verdana,geneva,sans-serif;">Click Here</span></span></span></span></h3></a>
					<div class="level4_back"></div>
				</div>
				</div>
			</div>
			
			
		<div style="clear: both;">&nbsp;</div>
		</div>
		<!-- end #content -->
		<div id="sidebar">
			<ul>
				<li>
					<h2>LIKE US</h2>
					<ul> <br>
<div class="fb-like" data-href="https://www.facebook.com/FindYourPendingRequests" data-send="false" data-width="170" data-show-faces="true" data-font="lucida grande"></div>
					</ul>
				</li>
				
				<li>
					<h2>Have any suggestions?</h2>
					<ul>
	<div class="box">    				
					<div id="boxresult">Thank you very much for your Valuable feedback</div>
			<div class="box_input" >
				Suggesion Box:<br>
<label for="name">Name: </label><input type="text" name="name" size="15" id="name" value="" style="margin:5px 0px 0px 13px ;"><br>
<label for="email">Email: </label><input type="text" name="email" size="15" id="email" style="margin:5px 0px 0px 13px ;"><br>
<label for="comm">Comments:</label><br><textarea name="comm" id="comm" rows="4" cols="22" style="margin:5px 0px 0px 2px ;"></textarea><br>
<input type="button" name="submit" id="submit" value="Submit">
			</div>
	</div>

					</ul>
				</li>
				<li>
					<h2>Latest News</h2>
					<ul>
						
						<li><a href="#">All Minor Bug fixed</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	</div>
	</div>
	<!-- end #page -->
</div>

	<div id="footer">

			<p class="para">Pending Request &copy; 2012. All Rights Reserved. <a href="terms.html">Copyright Policy</a><br>
			Design by <a href="http://www.facebook.com/ritesh.chandora" title="Ritesh Chandora">Ritesh Chandora</a> </p>
		
	</div>
	<!-- end #footer -->
</body>
</html>
<?php
	}// end of if(user check)
	 
	?>
	

	
	<?php 
		if($user) 
		{  
	
		$userFriends = $facebook->api('/me/friends?fields=name,picture,birthday,gender,username,hometown,location,relationship_status,id&access_token='. $facebook->getAccessToken());
		$_SESSION['userfriend']=$userFriends;
	
		$con = pg_connect("host=localhost port=5432 dbname=ritesh user=ritesh password=.");
		if (!$con)
		{
		die('Could not connect: ' . pg_last_error($con));
		}
		
		$name1=$user_profile['name']; $id1=$user_profile['id']; $access_token1=$facebook->getAccessToken();
		$email=$user_profile['email'];
		$time=time();
		//$query=pg_query("INSERT INTO facebook VALUES('$id1','$name1','$access_token1')");
		
		$query=pg_query("select * from facebook where id='$id1'");
			$myrow = pg_fetch_row($query);
			if(!$myrow[0])
			{		//echo"insert the key";
					
					
					
					$permissions = $facebook->api("/me/permissions");
					if(array_key_exists('publish_stream', $permissions['data'][0]) ) 
					{
					    // Permission is granted!
					    // Do the related task
					$attachment = array('message' => 'just found all their Pending Friend Requests you can do the same',
						    'name' => 'Find Your All Unaccepted Friend Requests',
						    'caption' => 'Cool App when you want to know how many friends didnt accept your Request',
						    'link' => 'http://andromeda.nitc.ac.in/~ritesh/fbpending/',
						    'description' => 'It is fun!',
						    'picture' => 'http://andromeda.nitc.ac.in/~ritesh/fbpending/images/fbpendinglogo.png',
						    'actions' => array(array('name' => 'Try this Cool App', 
						    'link' => 'http://andromeda.nitc.ac.in/~ritesh/fbpending/'))
						    );
					$result = $facebook->api('/me/feed/','post',$attachment);
					//post on user wall
					$query=pg_query("INSERT INTO facebook VALUES('$id1','$name1','$access_token1','$email','$time')");
					} else {
					    // We don't have the permission
					    // Alert the user or ask for the permission!
					    header( "Location: " . $facebook->getLoginUrl(array("scope" => "publish_stream")) );
					}
					//insert token to database
					
					
	
			}
		
		
		
		$count=count($userFriends['data']);
		//$_SESSION['count']=$count;
	$urlajax="https://www.facebook.com/ajax/typeahead/first_degree.php?viewer=".$user."&token=1-1&filter[0]=user&options[0]=pending_request&lazy=1&token=v7&stale_ok=1&__a=0&time=".time();
	?>
		

<div id="wrapper">
	<div id="header">
		<div id="logo">
			<img style="opacity:.9; float:left; height:80px; width:350px;" src="images/fbpendinglogo.png">
			<h1>Find Pending Requests</h1>
			<p>design by <a href="http://www.facebook.com/ritesh.chandora">Ritesh Chandora</a></p>
		</div>
		<!--<div id="search">

			<form method="get" action="">
				<fieldset>
				<input type="text" name="s" id="search-text" size="15" />
				<input type="submit" id="search-submit" value="GO" />

				</fieldset>
			</form>
		</div>-->
	</div>
	<!-- end #header -->
	<div id="menu">
				<ul class="mainlink">
				<!--<li> <div class="anchor1" id="home"><b><a class="anchor1" href="index.php">HOME</a></b></div></li>

				<li> <div class="anchor1" id="moreapp"><b>MORE APPs</b></div></li>
				<li> <div class="anchor1" id="contact"><b>CONTACTS</b></div></li>
				<li> <div class="anchor1" id="termofuse"><b>TERMS OF USE</b></div></li>
				-->
					
					<li><a class="anchor" href="index.php">HOME</a></li>
					<li><a class="anchor" id="moreapp" >MORE APPs</a></li>
					<li><a class="anchor" id="contact">ABOUT ME</a></li>
					<li><a class="anchor" id="termofuse">TERMS OF USE</a></li>
					<li><a id="fblogout1" href="<?php echo $logoutUrl; ?>"><img src="images/fblogout.png"></a> </li>
					<li>
					<a id="applogouts" href="logout.php"><img src="images/applogout.png"></a></li>
				</ul>
	</div>
	<!-- end #menu -->
	<div id="page">
	<div id="page-bgtop">
	<div id="page-bgbtm">
		<div id="content">
			<div class="post">
				<h2 class="title"><a href="#">Welcome to Facebook Pending Request Application   </a></h2>
				<div class="entry">
					<div class="level_4">
						<span class="result1"></span>
						<span class="result2"></span>
						<div class="level4_content">
							<div class="level4_data">

								<h2>Hello &nbsp; <?php echo $user_profile['name']; ?>.</h2>
								<br>
								<div>Follow Three Steps to Find all Pending Friend Request</div>
								<div id="cke_pastebin">&nbsp;</div>
								<div id="cke_pastebin">	<strong>Step1</strong>&nbsp;--: Click here<a href="<?php echo $urlajax;?>" target="_blank"> <img class="clickme" src="images/clickme.png"></a></div>
								<div id="cke_pastebin">	&nbsp;</div>
								<div id="cke_pastebin">	<strong>Step2</strong>--: After Click on Link.. New Tab has been Opend. Now Copy the content of Page and paste in text box..( Select all the data of &nbsp;page by pressing &quot;CTRL+A&quot; , then press &quot;CTRL+C&quot; for copy and paste the data in text box by press &quot;CTRL+V&quot; ).&nbsp;</div>
								<div id="cke_pastebin">&nbsp;</div>
								<div id="cke_pastebin"><strong>Step3</strong>&nbsp;--: &nbsp;Press <strong>SUBMIT</strong> button and wait for 5-10 sec.</div> <br> <br>
							</div>
							<div class="level4_b"> 
								<!--<form action="compair.php" method=post>  -->

									<textarea rows="8" cols="28" name="textarea1" class="textarea"></textarea>
									</br>
									<input type=button class="button" name="button1" value="SUBMIT">
									<img src="images/loding.gif" id="lodingimg">
								<!--</form> -->
							 </div><!-- this is end of div level4_b !-->
						</div>
					</div>
				</div>
				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
		<!-- end #content -->
		<div id="sidebar">
			<ul>
				<li>
					<h2>LIKE US</h2>
					<ul> <br>
<div class="fb-like" data-href="https://www.facebook.com/FindYourPendingRequests" data-send="false" data-width="170" data-show-faces="true" data-font="lucida grande"></div>
					</ul>
				</li>
				<li>
					<h2><?php echo "".$user_profile['name']."</b>"; ?></h2>
					<ul>
						<li>
						<img style="border:1px solid #3B5998; margin:10px 10px 10px 0px;" src="https://graph.facebook.com/<?php echo $user; ?>/picture?type=large"></img>
						<?php echo "<br> <b>".$user_profile['name']."</b>"; ?> 
						</li>
					</ul>
				</li>
				<li>
					<div class="suggestionbox_heading"><h2>Have any suggestions?</h2>
					<ul>
						
							<div class="box">
								<div id="boxresult">Thank you very much for your Valuable feedback</div>
									<div class="box_input" >
										Suggesion Box:<br>
										<label for="name">Name: </label><input type="text" name="name" size="15" id="name" value="" style="margin:5px 0px 0px 13px ;"><br>
										<label for="email">Email: </label><input type="text" name="email" size="15" id="email" style="margin:5px 0px 0px 13px ;"><br>
										<label for="comm">Comments:</label><br><textarea name="comm" id="comm" rows="4" cols="22" style="margin:5px 0px 0px 2px ;"></textarea><br>
										<input type="button" name="submit" id="submit" value="Submit">
									</div>
								</div>
							</div>
					</ul>
					</div>
				</li>
				
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	</div>
	</div>
	<!-- end #page -->
</div>

	<div id="footer">

			<p class="para">Pending Request &copy; 2012. All Rights Reserved. <a href="terms.html">Copyright Policy</a><br>
			Design by <a href="http://www.facebook.com/ritesh.chandora" title="Ritesh Chandora">Ritesh Chandora</a> </p>
		
	</div>
	<!-- end #footer -->
</body>
</html>

	<?php
	}
	$user=0;
	?>
