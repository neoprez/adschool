<?php
	$myhost = "localhost";
	$myuser = "root";
	$mypassw = "root";
	$mybd = "COLLEGE_KONNET";

	$mysqli = mysqli_connect($myhost, $myuser, $mypassw, $mybd) or die("Error " . mysqli_error($mysqli)); 
	function connect(){
		$myhost = "localhost";
		$myuser = "root";
		$mypassw = "root";
		$mybd = "COLLEGE_KONNET";

		$mysqli = mysqli_connect($myhost, $myuser, $mypassw, $mybd) or die("Error " . mysqli_error($mysqli)); 
	}

	function getEvents() {
		$mysqli = new mysqli("localhost", "root", "root", "COLLEGE_KONNET");
		$result = $mysqli->query("SELECT * FROM EVENT");
		return $result;
	}
?>