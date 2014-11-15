<?php
	include ('header.php');
	include_once ('connect.php');

	$test = "098f6bcd4621d373cade4e832627b4f6";

	$username = isset($_POST['username']) ? $_POST['username'] : '';
	$password = isset($_POST['password']) ? md5($_POST['password']) : '';

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
        $query = "SELECT name FROM Clients WHERE name = '$userName' AND password = '$userPass'";// AND password = $userPass";

        $result = mysqli_query( $con, $query);
        $row = mysqli_fetch_array($result);

        if(!$row){
            echo "<div>";
            echo "No existing user or wrong password.";
            echo "</div>";
        }
        else
            $loggedIn = true;
    }

    if ( !$loggedIn )
    {
        echo "
            <form action='logmein.php' method='post'>
                Name: <input type='text' name='name' value='$userName'><br>
                Password: <input type='password' name='pass' value='$userPass'><br>
                <input type='submit' value='log in'>
            </form>
        ";
    }
    else{
        echo "<div>";
        echo "You have been logged in as $userName!";
        echo "</div>";
        $_SESSION["name"] = $userName;
    }

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