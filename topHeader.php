<div id="user-details">
	<?php
		if($_SESSION["username"]) {
	?>
		<button type="button" onclick="changediv()">Rotate</button> Welcome <?php echo $_SESSION["username"]; ?> | <a href="logout.php" tite="Logout">Logout</a>
	<?php
		}
	?>
</div>
<div id="top">				
	<div id="header">				
		<div id="mainHeader">
			<h1><a href="index.php">Gallery</a></h1>
		</div>				
		
	</div>			
</div>