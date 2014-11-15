<?php
	include('header.php'); 
			echo "<div class='row'>
				<div class='large-12 columns'>
					<h1 id='slogan'>Share your events with the NYC college community! </h1>
				</div>
				<div class='large-12 slider columns'>
					<img src='images/banner.png'/>
				</div>
			</div>";
	include('footer.php');
	echo "<head>";
	echo "<title>Create Event</title>";
	echo "<link rel='stylesheet' type='text/css' href='style.css'>";
	//echo "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>";
	echo "<script src='script.js'></script>";
	echo "</head>";
	echo "<form id='formEvent' name='formEvent' method='post'>";
	echo "<fieldset>";
	echo "<h1>Add Event</h1>";
	echo "<table>";
	echo "<tr>";
	echo "<td>";
	echo "<input type='text' id='name' name='name' value='name'></input><br><br>";
	echo "<input type='text' id='location' name='location' value='location'></input><br><br>";
	echo "<span><input type='text' id='startDate' name='startDate' value='January 01 2015'></input>";
	echo "     <input type='text' id='endDate' name='endDate' value='January 01 2015'></input></span><br><br>";
	echo "<textarea id='description' name='description'>Description</textarea><br><br>";
	echo "<input type='text' id='tags' name='tags' value='tags'></input><br><br>";
	echo "<input type='text' id='link' name='link' value='link to other event'></input><br><br>";
	echo "<input type='text' id='price' name='price' value='0'></input><br><br>";
	echo "<button id='createEvent' name='createEvent' value='createEvent'>Create Event</button><br><br>";
	echo "</td>";
	echo "<td id='picture'>";
	echo "<span id='uploadPicture' name='uploadPicture'>";
	echo "<label for='uploadPicture'><p id='uploadPicture' name='uploadPicture' onclick='upload()' onmouseover='point(this)'>Upload Picture</p></label><br>";
	echo "<input type='file' id='uploadFile' name='uploadFile' accept='image/*' onchange='uploadPicture(this);'/></input>";
	echo "</span>";
	echo "</td>";
	echo "</tr>";
	echo "</table>";
	echo "</fieldset>";
	echo "</form>";
	
	createEvent();
	
	function createEvent()
	{
		if(isset($_POST['createEvent']))
		{
			if((isset($_POST['name']) && isset($_POST['location']) && isset($_POST['startDate']) && isset($_POST['endDate'])))
			{
				if(($_POST['name']!="") && ($_POST['location']!="") && ($_POST['startDate']!="") && ($_POST['endDate']!=""))
				{
					$username="root";
					$password="";
					$database="college_konnect";
					mysql_connect('localhost',$username,$password);
					@mysql_select_db($database) or die( "Unable to select database");
					$query = "INSERT INTO event VALUES ('','$_POST[name]','$_POST[startDate]','$_POST[endDate]','$_POST[price]','$_POST[location]','$_POST[link]','$_POST[description]','$_POST[tags]','$_POST[uploadFile]')";
					mysql_query($query);
					$result=mysql_query($query);
					if($result==false or $result<=0)
					{
						echo "An error has occurred.  Event not created.".mysql_error();
					}
					else if($result>0)
					{
						echo "Event created";
					}
					mysql_close();
					/*$message="";
					foreach($_POST as $key=>$value)
					{
						$message.="$key: $value"."<br>";
					}
					echo "<b>Insert into database values:</b><br>".$message."<br>";*/
				}
				else
				{
					echo "<b>Information is not all filled out:</b><br>".whatsMissing()."<br>";
				}
			}
			else
			{
				echo "<b>Information is not all filled out:</b><br>".whatsMissing()."<br>";
			}
		}
	}
		
	function whatsMissing()
	{
		$message="";
		if(!(isset($_POST['name'])))
		{
			$message.="Name is missing<br>";
		}
		else
		{
			if($_POST['name']=="")
			{
				$message.="Name is missing<br>";
			}
		}
		if(!(isset($_POST['location'])))
		{
			$message.="Location is missing<br>";
		}
		else
		{
			if($_POST['location']=="")
			{
				$message.="Location is missing<br>";
			}
		}
		if(!(isset($_POST['startDate'])))
		{
			$message.="Start date is missing<br>";
		}
		else
		{
			if($_POST['startDate']=="")
			{
				$message.="Start date is missing<br>";
			}
		}
		if(!(isset($_POST['endDate'])))
		{
			$message.="End date is missing<br>";
		}
		else
		{
			if($_POST['endDate']=="")
			{
				$message.="End date is missing<br>";
			}
		}
		if(!(isset($_POST['endDate'])))
		{
			$message.="End date is missing<br>";
		}
		else
		{
			if($_POST['endDate']=="")
			{
				$message.="End date is missing<br>";
			}
		}
		return $message;
	}
?>