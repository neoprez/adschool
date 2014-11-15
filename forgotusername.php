<?php
	include ('header.php');

	$email = isset($_POST['email']) ? $_POST['email'] : '';

	
?>
	<div class="row">
      <div class="large-12 columns">
      	<div class="panel">
	        <h3>Forgot Password</h3>
	        <p>Please, inform your e-mail so that we cand send your username.</p>

	        <form method="POST" action="forgotusername.php">

	        	<div class="row">
	        		<input type="text" name="email" id="email" placeholder="E-mail" />
	        	</div>

	        	<div class="row">
	        		<input class="small radius button" type="submit" value="Send">
	        	</div>
	        </form>
      	</div>
      </div>
    </div>
<?php
	include ('footer.php');
?>