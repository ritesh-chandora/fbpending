<div style="margin: 40px 40px 0px 40px; text-align: center; ">
	<span style="font-family:trebuchet ms,helvetica,sans-serif;"><span style="font-size:14px;">&nbsp; &nbsp; Guys here are your Pending Friend Requests.</span></span></div>
<div style="margin: 10px 40px 0px 40px; text-align: justify; ">
	<br />
	<span style="font-family:trebuchet ms,helvetica,sans-serif;"><span style="font-size:14px;">&nbsp; &nbsp; As you can see there are two sections.<br />
	&nbsp; &nbsp; Images in <strong>Conform</strong> section are your actual Pending Requests.&nbsp;And Images in <strong>Doubtful</strong> section are might be either Pending Request or your friend who once deactivate Facebook account or his privacy setting did not allow to access his data.</span></span></div>

<div style="margin: 10px 40px 0px 40px; ">
	&nbsp;</div>
<div style="margin: 10px 40px 0px 40px; ">
	<span style="font-family:verdana,geneva,sans-serif;"><span style="font-size:14px;">If you wanna delete your request then<br />
	<br />
	1 Click on the Pending Requests and&nbsp;their profile will open in next tab.<br />
	2. Put mouse on &nbsp;<img alt="image" src="images/friendrequestsend.png" style="vertical-align:middle;font-size: 14px; font-family: tahoma, geneva, sans-serif; width: 109px; height: 17px; " />&nbsp; and hover will appear, then click on Cancle Request.</span></span><br />
	&nbsp;</div>



	<hr>
<?php
@session_start();
require 'src/facebook.php';
$facebook = new Facebook(array(
  'appId'  => '201415399962503',
  'secret' => 'f96b635e8896fe8cf81b6c366283c14c',
  'cookie' => true,
));
$User_data=$_POST['textarea1'];
$userFriends=$_SESSION['userfriend'];
$user_profile=$_SESSION['user_profile'];
// code for creating json data formtaing
	$User_data=strstr("$User_data","{\"entries\"");
	$strpos= strripos($User_data,"]")+1;
	$strlenght= strlen($User_data)-1;
	for($i=$strpos;$i<=$strlenght;$i++)
	{
		$User_data=substr_replace($User_data,"",$strpos,1);
	}
	$User_data=substr_replace($User_data,"}",$strpos,1);
//	echo $User_data;
// this code return text that contain user data






	$pattern = '/(\d+),/i';
	$replacement = '"$1",';
	$final=preg_replace($pattern, $replacement, $User_data);
	$assocArray = json_decode($final, true);
	$arry1[] = array();
	$arry2[] = array();
	$arry3[] = array();

	for($i=0;$i<count($assocArray['entries']);$i++) { $arry1[$i]=$assocArray['entries'][$i]['uid']; }
	for($i=0;$i<count($userFriends['data']);$i++)   { $arry2[$i]=$userFriends['data'][$i]['id']; }

	$arry3=array_diff($arry1,$arry2);
$i=0;

	foreach($arry3 as $value) { $arry4[$i]=$value; $i++;}

$conform="";
$doutfull="";
$validity="";
$counter=0;
	for($i=0;$i<count($assocArray['entries']);$i++)
		{
			foreach($arry4 as $value)
			{
				if(!strcmp($value,$user_profile['id'])) continue;
				if(!strcmp($value,$assocArray['entries'][$i]['uid']))
					{
					try {
						$counter++;
						$validity=$facebook->api('/'.$value);
						if($validity)
						$conform=$conform."<li class='level4_li'><a href=http://www.facebook.com".$assocArray['entries'][$i]['path']." target='_blank'><img src=".$assocArray['entries'][$i]['photo'].">"."<h3>".$assocArray["entries"][$i]["text"]."</h3></a></li>";
						else
						$doutfull=$doutfull."<li class='level4_li'><a href=http://www.facebook.com".$assocArray['entries'][$i]['path']." target='_blank'><img src=".$assocArray['entries'][$i]['photo'].">"."<h3>".$assocArray["entries"][$i]["text"]."</h3></a></li>";
					    }
					catch (FacebookApiException $e) {
						 error_log($e);
						echo "Facebook Server Error : Application is not able to retrive data<br>";
						echo "Refresh you page or try after some time";
						 }
					}
			}
		}
if($counter)
		{
echo "<div class='a'><br>CONFIRM<br>".$conform."</div><hr>";
echo "<div class='a'><br>DOUBTFULL<br>".$doutfull."</div>";
}
else
echo "<br><br><br>&nbsp;&nbsp;&nbsp;  Good News that You don't have any Pending Friend Request..OR there might be an error in retriving data from facebook server";
