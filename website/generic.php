<!DOCTYPE HTML>

<html>
	<head>
		<title></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="search.html">Search Scheme</a></li>
							<li><a href="forum.php">Forum/Grievances</a></li> 
						</ul>
					</nav>

					<div id="main">
						<div class="inner">
								<h1>Digital Locker</h1>
								<?php
								  // Create database connection
								  $db = mysqli_connect("localhost", "root", "", "tsechack");

								  // Initialize message variable
								  $msg = "";

								  // If upload button is clicked ...
								  if (isset($_POST['upload'])) {
								  	// Get image name
								  	$image = $_FILES['image']['name'];
								  	// Get text
								  	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

								  	// image file directory
								  	$target = "images/".basename($image);

								  	$sql = "INSERT INTO img (image, image_text) VALUES ('$image', '$image_text')";
								  	// execute query
								  	mysqli_query($db, $sql);

								  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
								  		$msg = "Image uploaded successfully";
								  	}else{
								  		$msg = "Failed to upload image";
								  	}
								  }
								  $result = mysqli_query($db, "SELECT * FROM img");
								?>
								<!DOCTYPE html>
								<html>
								<head>
								<title>Image Upload</title>
								<style type="text/css">
								   #content{
								   	width: 50%;
								   	margin: 20px auto;
								   	border: 1px solid #cbcbcb;
								   }
								   form{
								   	width: 50%;
								   	margin: 20px auto;
								   }
								   form div{
								   	margin-top: 5px;
								   }
								   #img_div{
								   	width: 80%;
								   	padding: 5px;
								   	margin: 15px auto;
								   	border: 1px solid #cbcbcb;
								   }
								   #img_div:after{
								   	content: "";
								   	display: block;
								   	clear: both;
								   }
								   img{
								   	float: left;
								   	margin: 5px;
								   	width: 300px;
								   	height: 140px;
								   }
								</style>
								</head>
								<body>
								<div id="content">
								  <?php
								    while ($row = mysqli_fetch_array($result)) {
								      echo "<div id='img_div'>";
								      	echo "<img src='images/".$row['image']."' >";
								      	echo "<p>".$row['image_text']."</p>";
								      echo "</div>";
								    }
								  ?>
								  <form method="POST" action="generic.php" enctype="multipart/form-data">
								  	<input type="hidden" name="size" value="1000000">
								  	<div>
								  	  <input type="file" name="image">
								  	</div>
								  	<div>
								      <textarea
								      	id="text"
								      	cols="40"
								      	rows="4"
								      	name="image_text"
								      	placeholder="Say something about this image..."></textarea>
								  	</div>
								  	<div>
								  		<button type="submit" name="upload">POST</button>
								  	</div>
								  </form>
								</div>
								</body>
								</html>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<ul class="copyright">
								<li>&copy; Untitled. All rights reserved</li>
							</ul>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
