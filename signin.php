<? 
session_start();
//signin.php
include "connect.php";

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['lat']) && isset($_POST['lon'])){
	//cookie handling
	if(isset($_POST['rememberme'])){
		$_COOKIE['username'] = $_POST['username'];
		$_COOKIE['password'] = $_POST['password'];
	}
	$query = mysql_query('SELECT * FROM members WHERE username="'.$_POST['username'].'" AND password="'.$_POST['password'].'"');
	$num_rows = mysql_num_rows($query);

	if($num_rows == 0){
		echo 'No member details found. <a href="reset.php">Reset username/password</a>';
	} else {
		$fetch = mysql_fetch_assoc($query);

		//register session
		$_SESSION['id'] = $fetch['id'];
		//update lat long
		$update = mysql_query('UPDATE `members` SET `lat` = "'.$_POST['lat'].'", `lon` = "'.$_POST['lon'].'" WHERE `id` = "'.$_SESSION['id'].'"');
		
		if($update){
			echo $_SESSION['id'];
		} else {
			echo 'Unable to update lat, long';
		};
	};


} else {
	header("Location: index.php");
}


?>