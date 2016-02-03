<?php
	session_start();
	include_once 'dbconnect.php';
	$message="";
	if(count($_POST)>0) {
		$username=$_POST["username"];
		$password=$_POST["password"];
		
		$sql="SELECT * FROM login WHERE username='".$username."' and password='".$password."'";
		$result = mysqli_query($con, $sql);
		$row  = mysqli_fetch_array($result);
		if(is_array($row)) {
			$_SESSION["id"] = $row['id'];
			$_SESSION["username"] = $row['username'];
			$_SESSION["password"] = $row['password'];
		} else {
			$message = "Invalid Username or Password!";
		}
	}
	if(isset($_SESSION["id"])) {
		header("Location:user_dashboard.php");
}
?>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="styles.css" />
	</head>
	<body>
		<form name="frmUser" method="post" action="">
			<div class="loginform input-list style-1 clearfix">
				<h2>Login</h2>

				<input type="text" placeholder="Login" name="username" required/>	
				<input type="password" placeholder="Password" name="password" required/>
				<p>
					<input type="submit" name="loginButton" value="Login" />
				</p>
				<span><a href="register.php">Register</a></span>
			</div>
			
		</form>
	</body>
</html>