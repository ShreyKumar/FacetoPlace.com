<?
	//reset.php
	session_start();
	include "connect.php"

	//find email
	$row = mysql_fetch_assoc(mysql_query('SELECT * FROM members WHERE id="'.$_SESSION['id'].'"'));

	$to = $row['email'];
	$from = 'shreyansh.kumar@hotmail.com';
	$msg = 'Reset your password <a href="resetpwd.php">here</a>';

	$email = mail($to, 'Reset your password! Quickfriend.com', $msg);


?>