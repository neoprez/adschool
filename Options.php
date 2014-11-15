<?php
	echo "<head>";
	echo "<title>Create Options</title>";
	echo "</head>";
echo "<h1>Please tell us what you are Looking for :)</h1>";
echo "<form id='formPreferences' name='formPreferences' method='post'>";
echo "<fieldset>";
echo "<legend><h3><b>Preferences</b></h3></legend>";
echo "<select id='campus' name='campus'>";
echo "<option value='Campus'>Campus</option>";
echo "<option value='Lehman'>Lehman</option>";
echo "<option value='CCNY'>CCNY</option>";
echo "<option value='Baruch'>Baruch</option>";
echo "<option value='Columbia'>Columbia</option>";
echo "</select><br><br>";
echo "<select id='department' name='department'>";
echo "<option value='Department'>Department</option>";
echo "<option value='Mathematics'>Mathematics</option>";
echo "<option value='Biology'>Biology</option>";
echo "<option value='History'>History</option>";
echo "<option value='English'>English</option>";
echo "<option value='Physics'>Physics</option>";
echo "</select><br><br>";
echo "<input type='radio' id='textMessage' name='textMessage' value='text'>Receive Text Messages</input><br><br>";
echo "<input type='radio' id='emailMessage' name='emailMessage' value='email'>Receive Email</input><br><br>";
echo "<button id='update' name='update' value='update'>Update</button><br><br>";
echo "</fieldset>";
echo "</form>";

if(isset($_POST['update']))
{
	if(isset($_POST['textMessage']))
	{
		ini_set('smtp', 'localhost');
		ini_set('smtp_port','25');
		ini_set('sendmail_from', 'rperry@hmailserver.com');
		$header="From:9999999999@tmomail.net";
		$wasSent=mail('9173789188@tmomail.net','', 'hey ya',$header);
		if($wasSent)
		{
			echo "Message sent to 9173789188.  Thank you.";
		}
		else
		{
			echo "Message failed to be sent to 9173789188 due to an error.  Please try again.";
		}
	}
	if(isset($_POST['emailMessage']))
	{
		ini_set('smtp', 'localhost');
		ini_set('smtp_port','25');
		ini_set('sendmail_from', 'rperry@hmailserver.com');
		$wasSent=mail('starrv2011@gmail.com','Greetings', 'hey ya');
		if($wasSent)
		{
			echo "Message sent to starrv2011@gmail.com.  Thank you.";
		}
		else
		{
			echo "Message failed to be sent to starrv2011@gmail.com due to an error.  Please try again.";
		}
	}
}
?>
