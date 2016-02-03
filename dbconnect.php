<?php
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'nsgz');
	define('DB_USER', 'root');
	define('DB_PASSWORD','');

	$con = mysqli_connect("localhost",DB_USER,DB_PASSWORD,"nsgz");
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to database: " . mysqli_connect_error();
		}		
?>