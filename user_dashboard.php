<?php
	session_start();
?>
<html>
	<head>
		<title>User Login</title>
		<link rel="stylesheet" type="text/css" href="styles.css" />
		<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
		<link href="nailthumb/jquery.nailthumb.1.1.css" type="text/css" rel="stylesheet" />		
		
		<script type="text/javascript" src="js/jquery-2.2.0.min.js"></script>
		<script type="text/javascript" src="nailthumb/jquery.nailthumb.1.1.js"></script>		
		<script type="text/javascript" src="js/prototype.js"></script>
		<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
				
		<script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('.nailthumb-container').nailthumb({width:300,height:300});
        });		
		</script>
	</head>
	<body>
	<div id="heheszkidiv" class="flipdiv180">
		<div id="main-user-gallery">			
			<?php
			include('topHeader.php');
			?>
			<div id="verticalMenu">
				<span class="uploadButton">
					<a href="upload.php">Upload</a>
					
				</span>		
			</div>
			<div id="zawartosc">
				<div id="menu">
					<h2>Categories</h2>
					<ul>
					<?php
						include_once 'dbconnect.php';
						$sql="SELECT * FROM category WHERE id_user=".$_SESSION['id'];
						$result = mysqli_query($con, $sql);	
						if($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								$categoryId = $row['id'];
								$categoryName = $row['name'];
								echo "<li><a href='user_dashboard.php?id=$categoryId'>$categoryName</a></li>";
							}
						} else {
							$message = "Invalid user id!";
						}
					?>
					</ul>
					<span id="createCategoryLink"><a href="createCategory.php">Create category</a></span>
				</div>				
				<div id="center-zawartosc">
					
				<?php	
					include_once 'dbconnect.php';				
					$categoryId = null;
					if(!isset($_GET['id'])) {
						$sql = "SELECT * FROM category LIMIT 1";
						$result = mysqli_query($con, $sql);
						if($result->num_rows > 0) {
							$row = $result->fetch_assoc();
							$categoryId = $row['id'];
						}
					}
					else {						
						$categoryId = $_GET['id'];
					}
					$sql="select * from category where id=".$categoryId;
					$result = mysqli_query($con, $sql);
					$row = mysqli_fetch_array($result);
					$categoryName = $row['name'];
					if ($categoryName != null)
					{
						echo "<h2>$categoryName</h2>";
						$sql="SELECT * FROM photos WHERE user_id=".$_SESSION['id']." and category_id=".$categoryId;							
						$result = mysqli_query($con, $sql);	
						if($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								$comment = $row['comment'];
								$filePath = $row['file_path'];
								$dateTime = $row['date_time'];
								
								if (!file_exists($filePath)) {
									$sql="delete from photos where id=".$row['id'];
									mysqli_query($con, $sql);
									
								}
								else {
									echo "<a href='$filePath' data-lightbox='$categoryName'> 
											<div id='zdjecie' class='nailthumb-container square-thumb nailthumb-image-titles-animated-onhover' >
												<img src='$filePath' id='miniaturka' title='$comment'/>	
											</div>
										</a>";
								}
							}
						}		
					}							
					#nailthumb-container square-thumb
					$con->close();				
				?>
					
				</div>
			</div>
		</div>
		</div>
		<script type="text/javascript" src="js/lightbox.js"></script>
		<script type="text/javascript">
		jQuery("img").error(function(){
			$(this).hide();
		});
		</script>
		<script type="text/javascript">
		window.onload = scrollDownToTheTop;
		function scrollDownToTheTop() {
		window.scrollTo(0, document.body.scrollHeight);
		}
		</script>
		<script type="text/javascript">
		function changediv()
		{	
			if (document.getElementById("heheszkidiv")) {         
				document.getElementById("heheszkidiv").setAttribute("class", "");
				document.getElementById("heheszkidiv").setAttribute("id", "normaldiv");
			}
			else {     
				document.getElementById("normaldiv").setAttribute("class", "flipdiv180");
				document.getElementById("normaldiv").setAttribute("id", "heheszkidiv");
			}
		}
		</script>
		
	</body>
</html>