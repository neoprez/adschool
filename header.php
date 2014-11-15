<!DOCTYPE html >
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="styles.css" />
		<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
	</head>
	<body>
		<div id="pageWrapper">
			<header class="row">
				<div class="row">
					<?php if( $_SERVER['REQUEST_URI'] == '/adSchool/timeline.php' ) { ?>
						<a class="large-8 columns" name="timeline" href="timeline.php">Timeline</a>
						<a href="#" class="large-2 columns" style="float:right;"><img src="images/school-icon.png" class="icon" /></a>
						<h6 class="large-2 columns" style="float:right; padding-right:0; padding-left:54px; padding-top:6px;">Lehman College</h6>
						
					<?php } else { ?>
						<input type="text" name="search" placeholder="Search" class="large-3 columns" />
						<div class="large-4 columns"><h1></h1></div>
						<a class="large-1 columns" name="login" href="login.php">Log in</a>
						<a class="large-2 columns" name="signup" href="signup.php">Sign Up</a>
						<a class="large-2 columns" name="timeline" href="timeline.php">Timeline</a>
					<?php } ?>
				</div>
				<div class="row">
					<a class="large-12 logo columns" href="index.php"><img src="images/logo.png" /></a>
				</div>
			</header>