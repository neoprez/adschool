<?php
	include ('header.php');
	include_once ('connect.php');

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
							
							<div class="large-12 center" style="margin: 5px;">
								<input type="text" id="username" placeholder="Username" style="padding: 5px;" />
							</div>

							<!-- <label>Last Name</label> -->
							<div class="large-12 center" style="margin: 5px;">
								<input type="password" id="password" placeholder="Password" style="padding: 5px;" />
							</div>

							<div class="large-12 columns center" style="margin: 5px;">
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