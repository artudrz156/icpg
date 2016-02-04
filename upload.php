<?php
	session_start();
	include_once 'dbconnect.php';
?>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload" />
	<input type="text" name="comment" id="comment" />
	<select name="category">
	<?php
	
	$sql="SELECT * FROM category WHERE id_user=".$_SESSION['id'] ;
	$result = mysqli_query($con, $sql);	
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$categoryId = $row['id'];
			$categoryName = $row['name'];
			echo '<option value="'.$categoryId.'">'.$categoryName.'</option>';
		}
	} else {
		$message = "Invalid user id!";
	}
	?>
	</select>
    <input type="submit" value="Upload Image" name="submit" />
</form>

</body>
</html> 

<?php
if(isset($_POST['submit']))
{
	$target_dir = "uploads/".$_SESSION['username'];
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 5000000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			$comment = null;
			if(isset($_POST["comment"]))
			{
				$comment = $_POST["comment"];
			}
			$dateTime = date('Y-m-d H:i:s');
			$categoryName = "Undefined";
			
			$sql = "INSERT INTO photos(user_id, file_path, comment, date_time, category_name) 
					VALUES(".$_SESSION['id'].", '".$target_file."', '".$comment."', '".$dateTime."', '".$categoryName."')";
			
			if(mysqli_query($con, $sql))
			{				
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				$categoryId = 1;
				if(isset($_POST['category'])){
					$categoryId = $_POST['category'];
				}
				echo "<p><a href='user_dashboard.php?id=$categoryId'>Go back</a></p>";
			}
			else
			{
				# nie powiodl sie zapis do bazy trzeba usunac z dysku
				unlink($target_file);
			?>
				<script>alert('Sorry, there was an error uploading your file. Please try again.');</script>
			<?php
			}
		}
	}
}
$con->close();
?> 