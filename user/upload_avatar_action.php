<?php 
if($_SESSION['userlevel'] != 3 OR $_SESSION['userlevel'] != 8 OR $_SESSION['userlevel'] != 6){
	$target_dir = "images/avatars/";
	$target_file = $target_dir . basename($_FILES["photo"]["name"]);
	$uploadOk = false;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	// Check if image file is an actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["photo"]["tmp_name"]);
		if($check != false) {
			echo "<p>Image uploadé " . $check["mime"] . ".</p>";
			$uploadOk = true;
		}else {
			echo "<p>Le fichier n'est pas une image!</p>";
			$uploadOk = false;
		}	
	}

	// Check if file already exists
	if (file_exists($target_file)) {
		echo "<p>Le fichier existe déjà sur le serveur</p>";
		$uploadOk = false;
	}

	// Check file size
	if ($_FILES["photo"]["size"] > 1024000) {
		echo "<p>Le fichier est trop gros! Il doit être de 1MB max.</p>";
		$uploadOk = false;
	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
		echo "<p>Le format de l'image n'est pas supporté par le site</p>";
		$uploadOk = false;
	}	
	// Check if $uploadOk is set to 0 by an error
	if (!$uploadOk) {
		echo "<p>Le fichier n'as pas été uploadé</p>";
		// if everything is ok, try to upload file
	}else {
		if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
			$avatar_filename= basename( $_FILES["photo"]["name"]);
			$userID= $_SESSION['userID'];
			$db_connect= db_connect();
			$query="UPDATE avatar_filenames SET filename='$avatar_filename' WHERE users_id=$userID";
			$result= $db_connect->query($query);
			$query= "UPDATE users_noyau SET avatar=1 WHERE id=$userID";
			$result= $db_connect->query($query);
			if($result){
				echo "<p>Le fichier ". basename( $_FILES["photo"]["name"]). " a été uploadé.</p>";
				echo '<img src="images/avatars/'.$avatar_filename.'" alt="Profile Image" style="width:150px;height:150px">';
			}
		} else {
			echo "<p>Erreur sur l'upload du fichier.</p>";
		}
	}
	
}else {
	echo "!!! Vous ne pouvez pas accéder à cette page !!!";
}

?>