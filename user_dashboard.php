<?php
	session_start();
?>
<html>
	<head>
		<title>User Login</title>
		<link rel="stylesheet" type="text/css" href="styles.css" />
		<link rel="stylesheet" href="lightbox.css" type="text/css" media="screen" />

		<script type="text/javascript" src="jquery-ui/development-bundle/jquery-1.4.4.js"></script>
		<script type="text/javascript" src="nailthumb/jquery.nailthumb.1.1.js"></script>
		<link href="nailthumb/jquery.nailthumb.1.1.css" type="text/css" rel="stylesheet" />
		
		<script type="text/javascript" src="js/prototype.js"></script>
		<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
		<script type="text/javascript" src="js/lightbox.js"></script>
		
		<script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('.nailthumb-container').nailthumb({width:200,height:200});
        });
		</script>
	</head>
	<body>
		<div id="main-user-gallery">
			
			<div id="user-details">
				<?php
					if($_SESSION["username"]) {
				?>
					Welcome <?php echo $_SESSION["username"]; ?> | <a href="logout.php" tite="Logout">Logout</a>
				<?php
					}
				?>
			</div>
			<div id="top">
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
						<li><a href='index.php'>Strona główna</a></li>
						<li><a href='index.php'>Strona główna</a></li>
						<li><a href='index.php'>Strona główna</a></li>
						<li><a href='index.php'>Strona główna</a></li>
						<li><a href='index.php'>Strona główna</a></li>
						<li><a href='index.php'>Strona główna</a></li>
					</ul>
				</div>
				<div id="header">				
					<div id="mainHeader">
						<h1>Incredible Complicated User Gallery</h1>
					</div>				
				</div>
			</div>
			<div id="zawartosc">
				<div id="center-zawartosc">
				<?php
					$A = null;
					if (isset($_GET['name'])) {
						$A = $_GET['name'];
					}
					if ($obrazy = opendir('zdjecia/'.$A.'/')) {
						while (($plik = readdir($obrazy))!= false) {
							if(ereg(".gif$|.jpg$", $plik)) {		
								echo "<a href='zdjecia/$A/$plik' rel='lightbox[]'> 
									<div id='zdjecie' class='nailthumb-container square-thumb'>
										<img src='zdjecia/$A/$plik' />
									</div>
								</a>";
							}	
						}
						closedir($obrazy);	
					}
									
				?>
				</div>
			</div>
			<div id="content>
			
			<div>
		</div>
		
	</body>
</html>