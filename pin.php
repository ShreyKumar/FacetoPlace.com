<?
//pin.php
include "connect.php";
session_start();

if(isset($_SESSION['memberid']) && isset($_SESSION['id']) && isset($_POST['content'])){
	//get member ids
	$pineeid = $_SESSION['memberid'];
	$pinnerid = $_SESSION['id'];

	//grab content
	$content = $_POST['content'];

	//grab pinner details
	$getfirstlast = mysql_fetch_assoc(mysql_query('SELECT * FROM members WHERE id = "'.$pinnerid.'"'));
	$firstname = $getfirstlast['firstname'];
	$lastname = $getfirstlast['lastname'];

	//insert content
	//$insert = mysql_query('INSERT INTO '.$pineeid.'_pins (pinnerid, content) VALUES ("'.$pinnerid.'", "'.$content.'")');

	echo $firstname.' '.$lastname.' '.$content;


} else {
	header('Location: index.php');
};





?>