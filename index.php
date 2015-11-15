<?php
	include('user_login.php'); // Includes Login Script

	if(isset($_SESSION['username'])){
		header("location: user_dashboard.php");
	}
?>