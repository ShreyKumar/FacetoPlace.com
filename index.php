<?
    session_start();
    include "connect.php";
    //if(!isset($_SESSION['id'])){
        if(isset($_POST['signin'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysql_query('SELECT * FROM members WHERE username = "'.$username.'" AND password = "'.$password.'"');

        
        $num_rows = mysql_num_rows($query);

            if($num_rows == 1){
                //register session
                $fetch = mysql_fetch_assoc($query);

                $_SESSION['id'] = $fetch['id'];
                header('Location: profile.php?id='.$_SESSION['id']);
            } else {
                $errormsgsignin = "Looks like you don't exist, are you sure you're not a new user?";
            };
        };
    //} else {
        //header('Location: profile.php?id='.$_SESSION['id']);
    //};
    

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
		<link href="css/index.css" rel="stylesheet" media="screen">
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
			<h1> Hello there.</h1><br />
			<h3> Welcome to FacetoFace. Sign up now! Its free.</h3><br />
			<!-- Login form-->
			<div class="panel panel-default">
  				<div class="panel-body signup">
    				<h3>New User? Sign up.</h3>
    				<form role="search" method="post" id="registration" action="signup.php">
    					<div class="form-group">
                            <input type="text" class="form-control form-name" placeholder="Username" id="username" name="username">
                            <input type="password" class="form-control form-name" placeholder="Password" id="password" name="password"><br />
    						<input type="text" class="form-control form-name" placeholder="First name" id="firstname" name="firstname">   
    						<input type="text" class="form-control form-name" placeholder="Last name" id="lastname" name="lastname"><br />
    						<input type="text" class="form-control" placeholder="Email" id="email" name="email">
    						<select class="form-control birthays" id="day" name="day">
    							<option value="None">Birth day:</option>
    							<option value="1">1</option>
    							<option value="2">2</option>
    							<option value="3">3</option>
    							<option value="4">4</option>
    							<option value="5">5</option>
    							<option value="6">6</option>
    							<option value="7">7</option>
    							<option value="8">8</option>
    							<option value="9">9</option>
    							<option value="10">10</option>
    							<option value="11">11</option>
    							<option value="12">12</option>
    							<option value="13">13</option>
    							<option value="14">14</option>
    							<option value="15">15</option>
    							<option value="16">16</option>
    							<option value="17">17</option>
    							<option value="18">18</option>
    							<option value="19">19</option>
    							<option value="20">20</option>
    							<option value="21">21</option>
    							<option value="22">22</option>
    							<option value="23">23</option>
    							<option value="24">24</option>
    							<option value="25">25</option>
    							<option value="26">26</option>
    							<option value="27">27</option>
    							<option value="28">28</option>
    							<option value="29">29</option>
    							<option value="30">30</option>
    							<option value="31">31</option>
    						</select>
    						<select class="form-control birthdays" id="month" name="month">
    							<option value="None">Birth month:</option>
    							<option value="Jan">January</option>
    							<option value="Feb">Febuary</option>
    							<option value="Mar">March</option>
    							<option value="Apr">April</option>
    							<option value="May">May</option>
    							<option value="Jun">June</option>
    							<option value="Jul">July</option>
    							<option value="Aug">August</option>
    							<option value="Sep">September</option>
    							<option value="Oct">October</option>
    							<option value="Nov">November</option>
    							<option value="Dec">December</option>
    						</select>
    						<input class="form-control birthdays" placeholder="Year" id="year" type="text" name="year">
    						<input type="submit" class="btn btn-default" id="signup" value="Sign up" name="signup">
    					</div>
                        <div id="errormsgsignup" class="errormsg"></div>
    				</form>
  				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<h3>Already a user? Sign in.</h3>
					<form role="search" id="signin">
						<div class="form-group">
							<input type="text" class="form-control" id="signinusername" placeholder="Username" name="username"/>
							<input type="password" class="form-control" id="signinpassword" placeholder="Password" name="password">
							<input type="checkbox" id="rememberme" name="rememberme" style="margin-left: 65%; margin-top: 3%; margin-right: 2%"/>Remember me?
                            <input type="submit" class="btn btn-default" id="signin" value="Sign in" name="signin">
                            <div id="errormsgsignin" class="errormsg"></div>
						</div>
					</form>
				</div>
			</div>
		</div>
        <!-- Link JS -->
        <script type="text/javascript" src="js/custom.js"></script>
	</body>
</html>