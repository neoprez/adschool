<html>
	<head>
		<title>Sign Up</title>
	</head>
	<body>
		<!--Sign up using FB account-->
		<div id="facebook_signup">
			
		</div>
		<div id="signup_div">
			<form id="signup_form" action="signup.php">
				
				<label>First Name</label>
				<input type="text" id="form_firstname" />

				<br />

				<label>Last Name</label>
				<input type="text" id="form_lastname" />

				<br />

				<label>Email</label>
				<input type="text" id="form_email" />

				<br />

				<label>Re-type your Email</label>
				<input type="text" id="form_retype_email" />

				<br />

				<label>School</label>
				<select id="form_school">
					<option value="" selected="selected">None</option>
					<option value="1">Lehman College</option>
					<option value="2">City College of New York</option>
					<option value="3">Columbia University</option>
					<option value="0">Other</option>
				</select>
			</form>
		</div>
	</body>
</html>