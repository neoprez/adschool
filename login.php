<?php
	include ('header.php');
	include_once ('connect.php');

	// $test = "098f6bcd4621d373cade4e832627b4f6";

	// $username = isset($_POST['username']) ? $_POST['username'] : '';
	// $password = isset($_POST['password']) ? md5($_POST['password']) : '';

	// $stmt = mysqli_stmt_init($mysqli);

	// if($username != '' || $password != '') {

	// 	if (mysqli_stmt_prepare($stmt, "SELECT * FROM user WHERE username='". $username ."'"." AND password='". $password ."'")) {
	// 		mysqli_stmt_execute($stmt);
 //    		mysqli_stmt_bind_result($stmt, $result);
 //    		mysqli_stmt_fetch($stmt);
	// 	} else {

	// 	}
	// }

?>
<div id="general" style="margin: 25px;">
	<div class="row center">
		<div class="large-8 columns newpanel">
			<div id="signup_div">
				<form id="signup_form" action="timeline.php" method="POST">
					<!-- <label>First Name</label> -->
					<div class="large-12 columns">
						<h3>Login</h3>
					</div>

					<div>
						<input class="large-12 columns" type="text" name="username" id="username" placeholder="Username" style="padding: 5px; margin-bottom: 10px;" />
					</div>

					<div>
						<input class="large-12 columns" type="password" name="password" id="password" placeholder="Password" style="padding: 5px; margin-bottom: 10px;" />
					</div>

					<div>
						<input class="large-12 columns small radius button" type="submit" value="Login" />
					</div>

					<div class="large-6 medium-6 columns">
						<a href="forgotusername.php">Forgot Username?</a>
					</div>

					<div class="large-6 medium-6 columns">
						<a href="forgotpassword.php">Forgot Password?</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
	include ('footer.php');
?>