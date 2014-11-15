<?php 
	include('header.php'); 
	include('connect.php');

	$row = "";

	$tag = isset($tag) ? $tag : '';

	$_SESSION["name"] = isset($_SESSION["name"]) ? $_SESSION["name"] : '';

	// if(! $_SESSION["name"] )
 //    {
 //        header('Location: login.php');
 //    }

    
    if($tag) {
    	$query = "SELECT * FROM EVENT WHERE TAG_EVENT='$tag'";
    } else {
    	$query = "SELECT * FROM EVENT";
    }

    $result = mysqli_query( $mysqli, $query);
    $array = mysqli_fetch_array($result);

    if($array) {
    	echo "";
    }
?>
	<div class="row">
		<div class="large-12 columns" id="filter">
			<dl class="sub-nav">
			  <dt>Filter:</dt>
			  <dd class="active"><a href="#">All</a></dd>
			  <dd><a href="#">Category</a></dd>
			  <dd><a href="#">School</a></dd>
			  <dd><a href="#">Boroug</a></dd>
			</dl>
		</div>
		<div class="large-12 columns" id="tags">
			<dl class="sub-nav">
			  <dt>Tags:</dt>
			  <dd class="active"><a href="#">All</a></dd>
			  <dd><a href="#">School</a></dd>
			  <dd><a href="#">School</a></dd>
			  <dd><a href="#">School</a></dd>
			</dl>
		</div>
	</div>
	<div class="row">
		<div class="row category">
			<h6>Showing most popular events based on user likes</h6>
		</div>
		<div class="row content">
			<!--Event post-->
			<div class="event-post">
				<div class="large-12 columns post">
						<div class="event-image large-2 columns"><img src="images/school-icon.png"/></div>
						<div class="event-info large-8 columns">
							<h6 class="event-name"><a href="#">Come and see me coding!</a></h6>
							<p class="event-excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse minima dolorum et odit atque modi reiciendis sunt ullam sed consectetur nostrum, perspiciatis, magnam reprehenderit exercitationem beatae voluptas, earum a quod.</p>
						</div>
						<div class="social large-2 columns">
							<a href="#"><img src="images/unlike-heart.jpg" class="icon"/></a>
							<a href="#"><img src="images/share-icon.png" class="icon"/></a>
						</div>
				</div>
			</div>
			<!--end event post-->
		</div>
	</div>
<?php include('footer.php'); ?>