<?php

$name =  $_POST['name'];
$email = $_POST['email'];
$comm = $_POST['comm'];

/*
$name="riteh";
$email="adfsadf";
$comm= "adfasdf";*/
$con = pg_connect("host=localhost port=5432 dbname=ritesh user=ritesh password=.");
		if (!$con)
		{
		die('Could not connect: ' . pg_last_error($con));
		}
$query=pg_query("INSERT INTO comment VALUES('$name','$email','$comm')");
?>
