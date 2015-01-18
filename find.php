<?
//find.php
//Used to locate person on map


?>
<!-- Face to face -->
<!DOCTYPE html>
<html>
	<head>
        <title>FacetoFace.com</title>
		<!-- Link font -->
		<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
		<!-- Link Jquery-->
		<script type="text/javascript" src="js/jquery.js"></script>
		<!-- Link Map -->
		<script type="text/javascript" src="js/map.js"></script>
		<!-- Link bootstrap -->
		<link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap-theme.css.map" rel="stylesheet">
		<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap.css.map" rel="stylesheet">

		<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<!-- Link CSS -->
		<link href="css/index.css" rel="stylesheet" media="screen">
		<style type="text/css">
			iframe {
				height: 339px;
			}
		</style>
	</head>
	<body>
		<!-- Intro navbar -->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        				<span class="sr-only">Toggle navigation</span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
      				</button>
      				<!--Nav, links and other toggleing -->
      				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      				<a class="navbar-brand" href="#">FacetoFace.com</a>
      				<!--
      				<ul class="nav navbar-nav">
        				<li class="active"><a href="#">Link</a></li>
        				<li><a href="#">Link</a></li>
        				<li><a href="#">Link</a></li>
        				<li><a href="#">Link</a></li>
      				</ul>
      				-->
    			</div><!-- /.navbar-collapse -->
  			</div><!-- /.container-fluid -->
		</nav>
		
		<!-- Main content-->
		<div id="main"><br><br><br>
			<h3>Find new buddies!</h3>
		</div>
		<iframe src="map/map.php" width="100%" id="map"></iframe>
	</body>
</html>
