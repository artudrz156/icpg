<?php

include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
 $uname = mysql_real_escape_string($_POST['uname']);
 $upass = mysql_real_escape_string($_POST['pass']);
 
 if(mysqli_query($con, "INSERT INTO login(username, password) VALUES('$uname','$upass')"))
 {
  ?>
        <script>alert('successfully registered. You can login now. ');</script>
        <?php
		header("Location: index.php");
 }
 else
 {
  ?>
        <script>alert('error while registering... Check database connection');</script>
        <?php
 }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>Registration</title>
		<link rel="stylesheet" type="text/css" href="styles.css" />
	</head>
	<body>
		<form name="frmUser" method="post" action="">			
			<div class="loginform input-list style-1 clearfix">
				<h2>Register</h2>

				<input type="text" placeholder="Login" name="username" required />	
				<input type="password" placeholder="Password" name="password" required />
				<p>
					<input type="submit" name="btn-signup" value="Register" />
				</p>
				<span><a href="user_login.php">Back to login</a></span>
			</div>
			
		</form>
	</body>
</html>