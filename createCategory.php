<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>Create category</title>
		<link rel="stylesheet" type="text/css" href="styles.css" />
	</head>
	<body>
		<div id="heheszkidiv" class="flipdiv180">
			<?php
			include('topHeader.php');
			?>
			
			<div style="min-height:480px;">
				<form name="formCategory" method="post" action="">			
					<div class="loginform input-list style-1 clearfix" >
						<h2>Create category</h2>
						<input type="text" placeholder="Category name" name="categoryName" required />	
						<p>
							<input type="submit" name="create" value="Create" />
						</p>
						<span><a href="index.php">Go back</a></span>
					</div>
					
				</form>
			</div>
		</div>
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
	<script type="text/javascript">
		window.onload = scrollDownToTheTop;
		function scrollDownToTheTop() {
		window.scrollTo(0, document.body.scrollHeight);
		}
		</script>
	</body>
</html>
<?php
if(isset($_POST['create']))
{
	if (isset($_POST['categoryName']))
	{
		include_once 'dbconnect.php';
		$sql="select * from category where name='".$_POST['categoryName']."'";
		$result = mysqli_query($con, $sql);	
		if($result->num_rows == 0) {
			$sql="insert into category(name, id_user) values('".$_POST['categoryName']."', ".$_SESSION['id'].");";
			if(mysqli_query($con, $sql)) {
				echo "<br/>Category saved";
			}
			else {
				echo "<script>alert('Sorry category could not be saved.');</script>";
			}			
		}
		else {
			echo "<script>alert('Category with that name already exists');</script>";
		}
		$con->close();
	}
}	
?>
