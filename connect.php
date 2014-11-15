<?php
	$myhost = "localhost";
	$myuser = "root";
<<<<<<< HEAD
	$mypassw = "root";
	$mybd = "COLLEGE_KONNET";
=======
	$mypassw = "";
	$mybd = "college_konnet";
>>>>>>> b06fef1220bb15bca0b0fb43a7589a986d17325b

	$mysqli = mysqli_connect($myhost, $myuser, $mypassw, $mybd) or die("Error " . mysqli_error($mysqli)); 
?>