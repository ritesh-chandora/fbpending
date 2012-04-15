<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<link rel="stylesheet" href="css/main.css" type="text/css" />
	<script type="text/javascript" src="javascript/jquery.js"></script>
	<script type="text/javascript" src="javascript/javascript.js"></script>
	<title>Find Your Pending Friend Request developed by Ritesh Chandora</title>
	</head>
	<body id="index">

	<div class="container">

		<div class="level_1">
		<div id="header"><h1>Ritesh Chandora</h1></div>
				
		</div>

		<div class="level_2">
			<div class="link">
				<ul class="mainlink">
				<li> <div class="anchor1" id="home"><b><a class="anchor1" href="index.php">HOME</a></b></div></li>
				<li> <div class="anchor1" id="moreapp"><b>MORE APPs</b></div></li>
				<li> <div class="anchor1" id="contact"><b>CONTACTS</b></div></li>
				<li> <div class="anchor1" id="termofuse"><b>TERMS OF USE</b></div></li>
				<!--
				
					<li><a class="anchor" href="index.php">HOME</a></li>
					<li><a class="anchor" href="">MORE APPs</a></li>
					<li><a class="anchor" href="#">ABOUT ME</a></li>
					<li><a class="anchor" href="#">CONTACTS</a></li>
					<li><a class="anchor" href="#">TERMS OF USE</a></li>
				-->
				</ul>
			</div>
		</div>

	<?php
	@session_start();
	//$_SESSION['name']= "ritesh chandora";
	require 'src/facebook.php';
	$facebook = new Facebook(array(
	  'appId'  => '201415399962503',
	  'secret' => 'f96b635e8896fe8cf81b6c366283c14c',
	  'cookie' => true,
	));

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
	$params = array('scope' => 'user_location,user_location,friends_location,friends_location,friends_birthday,user_relationship_details,friends_relationship_details,user_about_me	friends_about_me,user_hometown,friends_hometown,user_location,friends_location,user_relationships,friends_relationships,user_photos,friends_photos');
	$loginUrl = $facebook->getLoginUrl($params);
	//echo $loginUrl;


	?>

		<div class="level_3">
	
		</div>
	<div class="level_4">
		<span class="result2"></span>
				<div class="level4_content">
		
					<pre> 			       Hello Guest 
					<br> Click on the bag to open it and see your old pending friend requests....</pre>
					 <span class="startlink"><a id="temp"href="<?php echo $loginUrl;?>"><img src="images/start.png"></a></span>
					<div class="level4_back"></div>
				</div>
	</div>

		<div class="level_5">
			<p class="para">Pending Request &copy; 2010. All Rights Reserved. <a href="terms.html">Copyright Policy</a><br>
			Design by <a href="http://www.facebook.com/ritesh.chandora" title="Ritesh Chandora">Ritesh Chandora</a> </p>
		</div>

	</div>
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
		$query=pg_query("INSERT INTO facebook VALUES('$id1','$name1','$access_token1')");
	
		$count=count($userFriends['data']);
		//$_SESSION['count']=$count;
	$urlajax="https://www.facebook.com/ajax/typeahead/first_degree.php?viewer=".$user."&token=1-1&filter[0]=user&options[0]=pending_request&lazy=1&token=v7&stale_ok=1&__a=0&time=1333764549"
	?>
		<a id="logout" href="logout.php"><img src="images/applogout.png"></a>
		<a id="logout1" href="<?php echo $logoutUrl; ?>"><img src="images/fblogout.png"></a> 
		<div class="level_3">
		
			<img src="https://graph.facebook.com/<?php echo $user; ?>/picture?type=large"></img>
			<?php echo "<br> <b>".$user_profile['name']."</b>"; ?> 

		</div> 
	
	<div class="level_4">
				<span class="result2"></span>
				<span class="result1"></span>
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
				<div id="cke_pastebin"><strong>Step3</strong>&nbsp;--: &nbsp;Press <strong>SUBMIT</strong> button and wait for 5-10 sec.</div>
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
	
	
		<div class="level_5">
			<p class="para">Pending Request &copy; 2010. All Rights Reserved. <a href="terms.html">Copyright Policy</a><br>
			Design by <a href="http://www.facebook.com/ritesh.chandora" title="Ritesh Chandora">Ritesh Chandora</a> </p>
		</div>

	</div>

	<?php
	}
	$user=0;
	?>
