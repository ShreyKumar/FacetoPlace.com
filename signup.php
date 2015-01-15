<?
	session_start();
	include "connect.php";
	
	$delete_original = mysql_query('SELECT * FROM members WHERE username="'.$_POST['username'].'" AND email="'.$_POST['email'].'"');
	$delete_rows = mysql_num_rows($delete_original);

	if($delete_rows > 1){
		$deleted = mysql_query('DELETE FROM members WHERE username="'.$_POST['username'].'" AND email="'.$_POST['email'].'"');
	};

	$query = mysql_query('INSERT INTO members (username, password, firstname, lastname, day, month, year, email) VALUES ("'.$_POST['username'].'", "'.md5($_POST['password']).'", "'.ucfirst($_POST['firstname']).'", "'.ucfirst($_POST['lastname']).'", "'.$_POST['day'].'", "'.$_POST['month'].'", "'.$_POST['year'].'", "'.$_POST['email'].'")');


	//get id
	$txt = 'SELECT * FROM members WHERE username="'.$_POST['username'].'"';
	$getid = mysql_fetch_assoc(mysql_query($txt));
	

	$_SESSION['id'] = $getid['id'];

	//create table to store all pins
	$pins_table = mysql_query('
		CREATE TABLE '.$getid['id'].'_pins (
		postid INT(11) AUTO_INCREMENT,
		userid INT(11),
		content LONGTEXT,
		time TIMESTAMP
		)
	');

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
		<!-- Link bootstrap -->
		<link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap-theme.css.map" rel="stylesheet">
		<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap.css.map" rel="stylesheet">

		<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<!-- Link CSS -->
		<link href="css/index.css" rel="stylesheet">
		<link href="css/signup.css" rel="stylesheet">
        <!-- Link JS -->
        <script type="text/javascript" src="js/custom.js"></script>
        <script type="text/javascript" src="js/signup.js"></script>
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
		<div id="main"><br /><br /><br />
			<h1>Congrats, you're ! </h1>
			<h3>This is your profile card!</h3>
			<div class="panel panel-default profilecard">
				<div class="panel-body">
					<table border="1" id="profiletable">
						<tr>
							<td><div class="usernamelabel">Username</div></td>
							<td><div class="usernamevalue field"><? echo $_POST['username'] ?></div></td>
						</tr>
						<tr>
							<td><div class="passwordlabel">Password</div></td>
							<td><div class="passwordvalue field"><? echo $_POST['password'] ?></div></td>
						</tr>
						<tr>
							<td><div class="firstnamelabel">Firstname</div></td>
							<td><div class="firstnamevalue field"><? echo $_POST['firstname'] ?></div></td>
						</tr>
						<tr>
							<td><div class="lastnamelabel">Lastname</div></td>
							<td><div class="lastnamevalue field"><? echo $_POST['lastname'] ?></div></td>
						</tr>
						<tr>
							<td><div class="emaillabel">Email</div></td>
							<td><div class="emailvalue field"><? echo $_POST['email'] ?></div></td>
						</tr>
						<tr>
							<td><div class="birthdaylabel">Birthday</div></td>
							<td><div class="birthdayvalue field"><? echo $_POST['day'].' '.$_POST['month'].', '.$_POST['year'] ?></div></td>
						</tr>
					</table>
				</div>
			</div>

			<!-- buttons -->
			<div class="panel panel-default profilecard">
				<div class="panel-body">
					<h3>Note: You can change this information after signing up. You will also be asked to verify email later.</h3> <br />
					<a href="profile.php?id=<? echo $_SESSION['id'] ?>"><input type="button" class="btn btn-default" id="go" value="Lets's go!" name="go"/></a>
				</div>
			</div>

		</div>