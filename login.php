<?php
	include ('header.php');
	include ('connect.php');

	$row = "";

	$username = isset($_POST['username']) ? $_POST['username'] : '';
	$password = isset($_POST['password']) ? ($_POST['password']) : '';

	$_SESSION["name"] = isset($_SESSION["name"]) ? $_SESSION["name"] : '';

    $loggedIn = false;
    $userName = $username;
    $userPass = $password;

	if( $_SESSION["name"] )
    {
        header('Location: timeline.php');
    }

    if ($userName && $userPass )
    {
        // User Entered fields
        $query = "SELECT * FROM USER WHERE EML_USER = '$userName' AND PSW_USER = '$userPass'";

        $result = mysqli_query( $mysqli, $query);
        $row = mysqli_fetch_row($result);

        var_dump($mysqli);
    }

    if($row) {
    	$loggedIn = true;
	    
	    if ( $loggedIn )
	    {
	        $_SESSION["name"] = $userName;
	    }
	    
        header('Location: timeline.php');
    }


?>
<div id="general" style="margin: 25px;">
	<div class="row center">
		<div class="large-8 columns newpanel">
<?php
        if(!$row && ($userName && $userPass)) {
            echo "<a  href='#' class='large-12 columns medium alert button'>Invalid Username or Password.</a>";
        }
?>
			<div id="signup_div">
				<form id="signup_form" action="login.php" method="POST">
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