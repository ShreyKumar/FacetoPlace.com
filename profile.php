<?
	session_start();
	include "connect.php";
	// DEFAULT FOR NAVBAR

	$getid = mysql_fetch_assoc(mysql_query('SELECT * FROM members WHERE id="'.$_SESSION['id'].'"'));


	// HANDLE ALL FRONT END DISPLAY
	if(isset($_GET['id'])){
		$query = mysql_query('SELECT * FROM members WHERE id="'.$_GET['id'].'"');
		$num_rows = mysql_num_rows($query);

		if($num_rows == 0){
			header("Location: members.php");
		} else {
			//fetch doggie!
			$row = mysql_fetch_assoc($query);
		};


	} else {
		header("Location: members.php");
	};


?>
<!DOCTYPE html>
<html>
	<head>
        <title>FacetoFace.com</title>
		<!-- Link font -->
		<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
		<!-- Link Jquery-->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript">
			/*
			var content = $("#content");
			var pin = $("#pin");
			//first, replace with html content
			pin.click(function(){
				$("#pinit > .panel-body").html(
					"<? 
						//first get firstname and lastname
						$fetchfl = mysql_fetch_assoc(mysql_query('SELECT * FROM members WHERE id="'.$_SESSION["id"].'"'));

						echo $fetchfl['firstname'];
					?>" + content.val()
				);
			});
			
			*/
		</script>
		<!-- Link bootstrap -->
		<link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap-theme.css.map" rel="stylesheet">
		<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap.css.map" rel="stylesheet">
		<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<!-- Link CSS -->
		<link href="css/profile.css" rel="stylesheet">
		<!-- Link JS -->
		<script type="text/javascript" src="js/custom.js"></script>
		<script type="text/javascript" src="js/profile.js"></script>
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
      				<p class="navbar-text navbar-right">Hey, <a href="profile.php?id=<? echo $getid['id'] ?>"><? echo $getid['firstname'] ?></a></p>
    			</div><!-- /.navbar-collapse -->
  			</div><!-- /.container-fluid -->
		</nav>
		
		<!-- Main content-->
		<div id="main"><br /><br /><br />
			<h3><?
					echo $row['firstname'].' '.$row['lastname'];
				?>
			</h3>
			<div class="panel panel-default" id="pinit">
				<?
					if(isset($_POST['pin'])){
						//set session memberid
						$_SESSION['memberid'] = $_GET['id'];
					};
				?>
				<div class="panel-body">
					<form method="post" id="pinform">
						<textarea rows="3" class="form-control" id="content" name="content">Pin something on <? echo $row['firstname'] ?>'s Pinboard!</textarea>
						<input type="button" class="btn btn-default" id="pin" name="pin" value="Pin!" />
					</form>
				</div>
			</div>
			<div class="panel panel-default profilecard">
				<div class="panel-body">
					<form>
						<table border="1" id="profiletable">
							<tr>
								<td><div class="firstnamelabel">Firstname</div></td>
								<td><div class="firstnamevalue field"><? echo $row['firstname'] ?></div></td>
							</tr>
							<tr>
								<td><div class="lastnamelabel">Lastname</div></td>
								<td><div class="lastnamevalue field"><? echo $row['lastname'] ?></div></td>
							</tr>
							<tr>
								<td><div class="emaillabel">Email</div></td>
								<td><div class="emailvalue field"><? echo $row['email'] ?></div></td>
							</tr>
							<tr>
								<td><div class="birthdaylabel">Birthday</div></td>
								<td><div class="birthdayvalue field"><? echo $row['day'].' '.$row['month'].', '.$row['year']?></div></td>
							</tr>
						</table>
						<a href="edit.php?id=<? echo $_GET['id']?>">Edit profile</a>
					</form>
				</div>
			</div>
			<?
				$gettb = mysql_query('SELECT * FROM '.$_GET['id'].'_pins');
				$gettb_numrows = mysql_num_rows($gettb);
				$gettb_fetchassoc = mysql_fetch_assoc($gettb);
				
				echo '<div id="allpins">';
				
				$i = 0;
				for($i = 0; $i < $gettb_numrows; $i++){
					$findpinner = mysql_fetch_assoc(mysql_query('SELECT * FROM members WHERE id="'.$gettb_fetchassoc['pinnerid'].'"'));
					
					if(fmod($i, 2) == 0){
						$property = 'pinned-right';
					} else {
						$property = 'pinned-left';
					};

					echo '
						<div class="panel panel-default '.$property.'">
							<div class="panel-body">
								<h4>'.$findpinner['firstname'].' '.substr($findpinner['lastname'], 0, 1).'.</h4><br />
								'.$gettb_fetchassoc['content'].'
							</div>
						</div>
					';
				};

				echo '</div>';

			?>
		</div>

	</body>
</html>