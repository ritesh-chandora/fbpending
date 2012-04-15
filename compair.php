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
	for($i=0;$i<count($assocArray['entries']);$i++)
		{
			foreach($arry4 as $value)
			{
				if(!strcmp($value,$user_profile['id'])) continue;
				if(!strcmp($value,$assocArray['entries'][$i]['uid']))
					{
					//try
					{
					$validity=$facebook->api('/'.$value);
					}
					//catch(e)
					{
					//echo "Error : Facebook is not respondin try after some time ";
					}
					//echo "validity value is \n".$validity;
					if($validity)
					$conform=$conform."<li class='level4_li'><a href=http://www.facebook.com".$assocArray['entries'][$i]['path']." target='_blank'><img src=".$assocArray['entries'][$i]['photo'].">"."<h3>".$assocArray["entries"][$i]["text"]."</h3></a></li>";
					else
					$doutfull=$doutfull."<li class='level4_li'><a href=http://www.facebook.com".$assocArray['entries'][$i]['path']." target='_blank'><img src=".$assocArray['entries'][$i]['photo'].">"."<h3>".$assocArray["entries"][$i]["text"]."</h3></a></li>";
					 }
			}
		}
echo "<div class='a'><br>CONFIRM<br>".$conform."</div><hr>";
echo "<div class='a'><br>DOUBTFULL<br>".$doutfull."</div>";
?>
