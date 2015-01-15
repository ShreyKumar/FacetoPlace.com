<? 
session_start();
//signin.php
include "connect.php";

if(isset($_POST['username']) && isset($_POST['password'])){
	$query = mysql_query('SELECT * FROM members WHERE username="'.$_POST['username'].'" AND password="'.$_POST['password'].'"');
	$num_rows = mysql_num_rows($query);

	if($num_rows == 0){
		echo 'No member details found. <a href="reset.php">Reset username/password</a>';
	} else {
		$fetch = mysql_fetch_assoc($query);

		//register session
		$_SESSION['id'] = $fetch['id'];

		echo 'Session registered with id='.$_SESSION['id'];
	};

} else {
	header("Location: index.php");
}


?>