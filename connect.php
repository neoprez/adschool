<?php
	$myhost = "localhost";
	$myuser = "root";
	$mypassw = "";
	$mybd = "college_konnet";

	$mysqli = mysqli_connect($myhost, $myuser, $mypassw, $mybd) or die("Error " . mysqli_error($mysqli)); 
?>