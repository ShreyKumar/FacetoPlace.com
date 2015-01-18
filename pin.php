<?
//pin.php
include "connect.php";
session_start();

if(isset($_POST['pinneeid']) && isset($_SESSION['id']) && isset($_POST['content'])){
	//get member ids
	$pinneeid = $_POST['pinneeid'];
	$pinnerid = $_SESSION['id'];

	//grab content
	$content = $_POST['content'];

	//grab pinner details
	$getfirstlast = mysql_fetch_assoc(mysql_query('SELECT * FROM members WHERE id = "'.$pinnerid.'"'));
	$firstname = $getfirstlast['firstname'];
	$lastname = $getfirstlast['lastname'];

	//insert content
	//$insert = mysql_query('INSERT INTO '.$pinneeid.'_pins (pinnerid, content) VALUES ("'.$pinnerid.'", "'.$content.'")');

	echo $firstname.' '.$lastname.' '.$content;


} else {
	echo $_SESSION['memberid'].$_SESSION['id'].$_POST['content'];
};





?>