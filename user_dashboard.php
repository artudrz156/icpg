<?php
	session_start();
?>
<html>
	<head>
		<title>User Login</title>
		<link rel="stylesheet" type="text/css" href="styles.css" />
	</head>
	<body>
		<div id="mainUserGallery">
			<div id="header">
				<div id="userDetails">
					<?php
						if($_SESSION["username"]) {
					?>
						Welcome <?php echo $_SESSION["username"]; ?> | <a href="logout.php" tite="Logout">Logout.</a>
					<?php
						}
					?>
				</div>
				<div id="mainHeader">
					<h1>Incredible Complicated User Gallery</h1>
				</div>				
			</div>
			<div id="menu">
				<ul>
					<li><a href='index.php'>Strona główna</a></li>
					<?php	
						if ($foldery = opendir('zdjecia/')) {
							while (($dir = readdir($foldery))!=false) { 
								if(!ereg(".gif$|.jpg$", $dir)) {
									if ($dir != "." && $dir != "..") {	
										echo "<li><a href='user_dashboard.php?name=$dir'>$dir</a></li>";
									}
								}
							}
						}
						closedir($foldery);
					?>
				</ul>
			</div>
			<div id="zawartosc">
				<?php
					$A = null;
					if (isset($_GET['name'])) {
						$A = $_GET['name'];
					}
					if ($obrazy = opendir('zdjecia/'.$A.'/')) {
						while (($plik = readdir($obrazy))!=false) {
							if(ereg(".gif$|.jpg$", $plik)) {		
								echo "<a href='zdjecia/$A/$plik' rel='lightbox[]'> <div id='zdjeciecale'>
										<div id='zdjecie'><img src='zdjecia/$A/$plik' /></div> 
										<div id='podpis'>$plik</div>
										</div></a>";
							}	
						}
						closedir($obrazy);	
					}
					
					
				?>
			</div>
			<div id="content>
			
			<div>
		</div>
		
	</body>
</html>