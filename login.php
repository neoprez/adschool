<?php
	include ('header.php');
	include_once ('connect.php');

	$test = "098f6bcd4621d373cade4e832627b4f6";

	$username = isset($_POST['username']) ? $_POST['username'] : '';
	$password = isset($_POST['password']) ? md5($_POST['password']) : '';

	$_SESSION["name"] = isset($_SESSION["name"]) ? $_SESSION["name"] : '';

	if( $_SESSION["name"] )
    {
        http_redirect('timeline.php');
    }

    $loggedIn = false;
    $userName = $username;
    $userPass = $password;

    if ($userName && $userPass )
    {
        // User Entered fields
        $query = "SELECT * FROM USER WHERE EML_USER = '$userName' AND PSW_USER = '$userPass'";

        $result = mysqli_query( $mysqli, $query);
        $row = mysqli_fetch_array($result);
    }

    if ( $loggedIn )
    {
        $_SESSION["name"] = $userName;
    }

?>
<div id="general" style="margin: 25px;">
	<div class="row center">
		<div class="large-8 columns newpanel">
<?php
        if(!$row) {
            echo "<a href='#' class='medium alert button'>No existing Username or Password.</a>";
        }
        else {
            $loggedIn = true;
        }
?>
			<div id="signup_div">
				<form id="signup_form" action="login.php" method="POST">
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