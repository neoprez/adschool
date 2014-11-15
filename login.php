<?php
	include ('header.php');
	include_once ('connect.php');

	$test = "098f6bcd4621d373cade4e832627b4f6";

	$username = isset($_POST['username']) ? $_POST['username'] : '';
	$password = isset($_POST['password']) ? md5($_POST['password']) : '';

	if($username != '' || $password != '') {
		$stmt =  $mysqli->stmt_init();

		if ($stmt->prepare("SELECT * FROM user WHERE username='". $username ."'"." AND password='". $password ."'")) {
			echo "work";
		}
	}

?>
		<!--Sign up using FB account-->
		<div id="facebook_signup">
			
		</div>
		<div class="row center">
			<div class="large-12 columns">
				<div class="panel">
					<div id="signup_div">
						<form id="signup_form" action="login.php" method="POST">
							<!-- <label>First Name</label> -->
							
							<div class="large-12 columns">
								<input type="text" id="username" placeholder="Username" style="padding: 5px;" />
							</div>

							<!-- <label>Last Name</label> -->
							<div class="large-12 columns">
								<input type="password" id="password" placeholder="Password" style="padding: 5px;" />
							</div>

							<div class="large-12 columns">
								<input class="small radius button" type="submit" value="Login" />
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