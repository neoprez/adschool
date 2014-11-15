<?php include('header.php'); ?>


<div class="row center newpanel">
	<div class="large-12 columns ">
<h2>Sign Up</h2>
<?php
if(isset($_POST['signup']))
{
	if(isset($_POST['textMessage']) && isset($_POST['phone']))
	{
		ini_set('smtp', 'localhost');
		ini_set('smtp_port','25');
		ini_set('sendmail_from', 'rperry@hmailserver.com');
		$header="From:9999999999@tmomail.net";
		$to=$_POST['phone']."@tmomail.net";
		$wasSent=mail($to,'', 'college konnect alert',$header);
		if($wasSent)
		{
			echo "Message sent to $_POST[phone].  Thank you.<br>";
		}
		else
		{
			echo "Message failed to be sent to $_POST[phone] due to an error.  Please try again.<br>";
		}
	}
	if(isset($_POST['emailMessage']) && isset($_POST['email']))
	{
		ini_set('smtp', 'localhost');
		ini_set('smtp_port','25');
		ini_set('sendmail_from', 'rperry@hmailserver.com');
		$to=$_POST['email'];
		$wasSent=mail($to,'Greetings', 'college konnect alert');
		if($wasSent)
		{
			echo "<p>Message sent to $_POST[email].  Thank you.</p>";
		}
		else
		{
			echo "<p>Message failed to be sent to $_POST[email] due to an error.  Please try again.</p>";
		}
	}
	if((isset($_POST['fname'])) && (isset($_POST['lname'])) && (isset($_POST['email'])) && (isset($_POST['phone'])) && (isset($_POST['confirmEmail'])) && (isset($_POST['password'])) && (isset($_POST['confirmPassword'])))
	{
		if(($_POST['fname']!="") && ($_POST['lname']!="") && ($_POST['email']!="") && ($_POST['phone']!="") && ($_POST['confirmEmail']!="") && ($_POST['confirmPassword']!=""))
		{
			echo "<p>You are signed up</p>";
		}
		else
		{
				echo "<p>Some information is missing, you are not signed up</p>";	
		}
	}
	else
	{
		echo "<p>You are missing some information. You are not signed up</p>";
	}
}
?>
<form method="post" action=''>
  <div class="row center">
    <div class="large-12 columns ">
    
<div class="row center">
<label> 
    <input class="large-12 columns round" name="fname" type="text" placeholder="First Name" value="first name" />
 </label> 
 </div>
 <br>
    
<div class="row center">   
<label>
	<input class="large-12 columns round" name="lname" type="text" placeholder="Last Name" value="last name" />
</label>
</div>
<br>
      
        
<div class="row center">       
<label>
	<input class="large-12 columns round" type="text" name='email' placeholder="School Email" value="starrv2011@gmail.com" />
</label>
</div>
<br>

<div class="row center">       
<label>
	<input class="large-12 columns round" type="text" name='phone' placeholder="Phone" value="9173789188" />
</label>
</div>
<br>
      
 <div class="row center">        
<label>
	<input class="large-12 columns round" type="text" name='confirmEmail' placeholder="Confirm School email" value="email"/>
</label>
</div>
<br>
      
<div class="row center">       
<label>
	<input class="large-12 columns round" type="password" name="password" placeholder="Password" value="password"/>
</label>
</div>
<br>
      
<div class="row center">          
<label>
    <input class="large-12 columns round" type="password" name="confirmPassword" placeholder="Re-enter Password" value="password"/>
</label>
</div> 
<br>      
<?php
echo "<input type='radio' id='textMessage' name='textMessage' value='text'>Receive Text Messages</input><br><br>";
echo "<input type='radio' id='emailMessage' name='emailMessage' value='email'>Receive Email</input><br><br>";
 ?>     
<div class="row center">  
<button name="signup" class="button [tiny small large] large-12 columns round">Sign Up</button>
 
<p>By signing up, you agree to our <a href="#" class="policy">terms of use</a> 
and <a href ="#" class= "policy">privacy policy</a></p>
</form>

</div>
       		
       		
       
      				</div>
      			
    			</div>
 		</div>   		
  </div>
				
<?php include('footer.php'); ?>

