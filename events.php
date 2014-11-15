<?php include('header.php'); 
	echo "<script src='./dbscript/script.js'></script>";
	echo "<div class='row'>";
		echo "<div class='newpanel center'>";
		createEvent();
		echo "<form id='formEvent' name='formEvent' method='post'>";
		echo "<fieldset>";
		echo "<h1>Add Event</h1>";
		echo "<div class='large-12 medium-12 small-12 columns'>";
			echo "<input type='text' id='name' name='name' value='name' />";
		echo "</div>";
		echo "<div class='large-12 medium-12 small-12 columns'>";
			echo "<input type='text' id='location' name='location' value='location' />";
		echo "</div>";
		echo "<div class='large-12 medium-12 small-12 columns'>";
			echo "<span><input type='text' id='startDate' name='startDate' value='January 01 2015' class='large-12 medium-12 small-12 columns'/>";
			echo "     <input type='text' id='endDate' name='endDate' value='January 01 2015'/>";
		echo "</div>";
		echo "<div class='large-12 medium-12 small-12 columns'>";
			echo "<textarea id='description' name='description' rows='40'>Description</textarea>";
		echo "</div>";
		echo "<div class='large-12 medium-12 small-12 columns'>";
			echo "<input type='text' id='tags' name='tags' value='tags'/>";
		echo "</div>";
		echo "<div class='large-12 medium-12 small-12 columns'>";
			echo "<input type='text' id='link' name='link' value='link to other event'/>";
		echo "</div>";
		echo "<div class='large-12 medium-12 small-12 columns'>";
			echo "<input type='text' id='price' name='price' value='0'/>";
		echo "</div>";
		echo "<div class='large-12 medium-12 small-12 columns'>";
			echo "<button id='createEvent' name='createEvent' value='createEvent'>Create Event</button>";
		echo "</div>";
		echo "<div class='large-12 medium-12 small-12 columns'>";
			echo "<span id='uploadPicture' name='uploadPicture'>";
			echo "<label for='uploadPicture'><p id='uploadPicture' name='uploadPicture' onclick='upload()' onmouseover='point(this)'>Upload Picture</p></label><br>";
			echo "<input type='file' id='uploadFile' name='uploadFile' accept='image/*' onchange='uploadPicture(this);'/>";
			echo "</span>";
		echo "</div>";
		echo "</fieldset>";
		echo "</form>";
				echo "</div>";
			echo "</div>";
	include('footer.php'); 
	
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
					if(!(isset($_POST['uploadFile'])))
					{
						$_POST['uploadFile']=null;
					}
					$query = "INSERT INTO event VALUES ('','$_POST[name]','$_POST[startDate]','$_POST[endDate]','$_POST[price]','$_POST[location]','$_POST[link]','$_POST[description]','$_POST[tags]','$_POST[uploadFile]')";
					$result=mysql_query($query);
					if($result==false or $result<=0)
					{
						echo "<br><p id='dialog'>An error has occurred.  Event not created.</p>";
						//.mysql_error();
					}
					else if($result>0)
					{
						echo "<br><p id='dialog'>Event created</p>";
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
					echo "<br><p id='dialog'><b>Information is not all filled out:</b><br>".whatsMissing()."</p>";
				}
			}
			else
			{
				echo "<br><p id='dialog'><b>Information is not all filled out:</b><br>".whatsMissing()."</p>";
			}
		}
		else
		{
			echo "<br><p id='dialog'>Please Create an Event</p>";
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