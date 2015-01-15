<?
//edit.php
include "connect.php";
session_start();

//display everything
if(!isset($_SESSION['id'])){
	header("Location: index.php");
} else {
	$getinfo = mysql_fetch_assoc(mysql_query('SELECT * FROM members WHERE id="'.$_SESSION['id'].'"'));
};

//handle editing here

if(isset($_SESSION['change'])){
	$change = mysql_query('UPDATE `facetoface`.`members` SET username="'.$_POST['username'].'", password="'.$_POST['password'].'", firstname="'.$_POST['firstname'].'", lastname="'.$_POST['lastname'].'", day="'.$_POST['day'].'", month="'.$_POST['month'].'", year="'.$_POST['year'].'", email="'.$_POST['email'].'" WHERE `members`.`id`="'.$_SESSION['id'].'"');
	if($change){
		//successfully changed!
	}
};

?>