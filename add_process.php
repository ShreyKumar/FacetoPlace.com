<?
//add_process.php

//grab query
$query = $_POST['query'];

$check = mysql_query('SELECT * FROM members WHERE username="'.$_POST['query'].'" OR firstname="'.$_POST['query'].'" OR lastname="'.$_POST['query'].'" OR email="'.$_POST['email'].'"');

$num_rows = mysql_num_rows($check);

if($num_rows == 0){
	echo 'Oops, the buddy you are trying to find is not registered. Why not <a href="invite.php">invite</a> him?'
} else {
	$fetch = mysql_fetch_assoc($check);
	//display in  table
	echo '
	Your search shows '.$num_rows.' results.
	<table border="1">';
		for($i = 0; $i < $num_rows; $i++){
			echo '
				<tr>
					<td>Username</td>
					<td>'.$fetch['username'].'</td>
					<td>Firstname</td>
					<td>'.$fetch['firstname'].'</td>
					<td>Lastname</td>
					<td>'.$fetch['lastname'].'</td>
					<td>Date of birth</td>
					<td>'.$fetch['month'].' '.$fetch['day'].' '.$fetch['year'].'</td>
					<td>Email</td>
					<td>'.$fetch['email'].'</td>
				</tr>
			';
		}
	echo '</table>';
}



?>