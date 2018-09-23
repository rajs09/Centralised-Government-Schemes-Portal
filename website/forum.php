<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Forum/Grievances</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
 #myDIV {
    width: 100%;
    padding: 50px 0;
    text-align: center;
    background-color: lightblue;
    margin-top: 20px;
}

</style>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="index.html" class="logo">
								</a>

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
							<li><a href="index.html">Government Schemes</a></li>
							<li><a href="generic.php">Digital Locker</a></li>
								<li><a href="search.html">Search Scheme</a></li>

						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<h1>Forum/Grievances</h1>

							<?php
							  // Create database connection
							  $db = mysqli_connect("localhost", "root", "", "tsechack");


							  if (isset($_POST['upload'])) {
							  	$comment = $_POST["comment"];
							    #$userid = $_POST["userid"];
							  	$sql = "INSERT INTO forum (user_name,comment) VALUES ('raj', '$comment')";
							  	// execute query
							  	mysqli_query($db, $sql);

							  $result = mysqli_query($db, "SELECT * FROM forum");

							    while ($row = mysqli_fetch_array($result))
							     {
							      echo "<div>";
							      	echo "<h3>".$row['user_name'].":"."</h3>";
							      	echo "<p>".$row['comment']."</p>";
							      echo "</div>";
							    }
							  }
							  ?>
							  <div id="content">
							  <form method="POST" action="forum.php" enctype="multipart/form-data">
							  	<input type="hidden" name="user_id" value="2">

							  	<div>
							      <textarea
							      	id="comment"
							      	cols="40"
							      	rows="4"
							      	name="comment"
							      	placeholder="Post a comment..."></textarea>
							  	</div>
									<br>
							  	<div>
							  		<button type="submit" name="upload">POST</button>
							  	</div>
							  </form>
							</div>




		<!-- Scripts -->
		<script>
		function myFunction() {
		var x = document.getElementById("Mydiv");
		if (x.style.display === "none") {
			x.style.display = "block";
		} else {
			x.style.display = "none";
		}


		}
</script>

<script>
		function myFunction1() {
		var y = document.getElementById("Mydiv1");
		if (y.style.display === "none") {
			y.style.display = "block";
		} else {
			y.style.display = "none";
		}


		}
</script>
<script>
		function myFunction2() {
		var z = document.getElementById("Mydiv2");
		if (z.style.display === "none") {
			z.style.display = "block";
		} else {
			z.style.display = "none";
		}


		}
</script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
