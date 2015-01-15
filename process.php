<?
	//process.php
	session_start();
	include "connect.php";

	if(isset($_POST['username'])){
		//grab value
		$username = $_POST['username'];

		//check in database
		$query = mysql_query('SELECT * FROM members WHERE username = "'.$username.'"');

		$num_rows = mysql_num_rows($query);

		if($num_rows == 1){
			echo 'Username already taken!';
		} else if(strlen($username) < 5 || !ctype_alnum($username)){
			echo 'A username must be at least 5 characters and must contain alphanumeric characters :(';
		} else {
			echo 'Username available!';
		};
	};


	if(isset($_POST['email'])){
		//grab value
		$email = $_POST['email'];

		//check in database
		$query = mysql_query('SELECT * FROM members WHERE email = "'.$email.'"');

		$num_rows = mysql_num_rows($query);

		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			if($num_rows == 1){
				echo "Email already in use!";
			} else {
				echo "Email available!";
			};
		} else {
			echo "Invalid email!";
		};
	};
	
?>