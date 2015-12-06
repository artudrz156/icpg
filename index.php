<?php
	include('user_login.php');

	if(isset($_SESSION['username'])){
		header("location: user_dashboard.php");
	}
?>