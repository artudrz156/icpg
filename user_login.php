<?php
	session_start();
	$message="";
	if(count($_POST)>0) {
		$username=$_POST["username"];
		$password=$_POST["password"];
		$conn = mysqli_connect("localhost",$username,$password,"nsgz");
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to database: " . mysqli_connect_error();
		}		
		$sql="SELECT * FROM login WHERE username='".$username."' and password='".$password."'";
		$result = mysqli_query($conn, $sql);
		$row  = mysqli_fetch_array($result);
		if(is_array($row)) {
			$_SESSION["id"] = $row['id'];
			$_SESSION["username"] = $row['username'];
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
		<title>User Login</title>
		<link rel="stylesheet" type="text/css" href="styles.css" />
	</head>
	<body>
		<form name="frmUser" method="post" action="">
			<div class="message"><?php if($message!="") { echo $message; } ?></div>
			<table border="0" cellpadding="10" cellspacing="1" width="500" align="center">
				<tr class="tableheader">
					<td align="center" colspan="2">Enter Login Details</td>
				</tr>
				<tr class="tablerow">
					<td align="right">Username</td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr class="tablerow">
					<td align="right">Password</td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr class="tableheader">
					<td align="center" colspan="2"><input type="submit" name="submit" value="Submit"></td>
				</tr>
			</table>
		</form>
	</body>
</html>