<?php
$_SESSION['user_profile']=NULL;
$_SESSION['userfriend']=NULL;
session_destroy();
header("Location: index.php");  
?>
