<?
//create.php
include "connect.php";
session_start();

//handle insertion inside circles table
$query = mysql_query('INSERT INTO circles (circlename, head_id, buddies) VALUES ("'.$_POST['circlename'].'", "'.$_SESSION['id'].'", "")');

?>