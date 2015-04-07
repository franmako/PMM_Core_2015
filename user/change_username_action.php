<?php
if (isset($_POST['username_new']) AND isset($_POST['password'])) {
	$username_new= $_POST['username_new'];
	$password_typed= $_POST['password'];
	$db_connect= db_connect();
	
	$userID= $_SESSION['userID'];
	$query_password_check= "SELECT * FROM users_noyau WHERE id=$userID AND password='$password_typed'";
	$password_check= $db_connect->query($query_password_check);
	
	if (mysqli_num_rows($password_check) == 1) {
		$query="SELECT * FROM users_noyau WHERE username = '$username_new';";
		$checkUserName= $db_connect->query($query);
		if (mysqli_num_rows($checkUserName) == 1) {
			echo "Le nom d'utilisateur est indisponible! Veuillez en choisir un autre.";
		}else {
			
		}
	}else {
		echo "Le mot de passe ne correspond pas à l'utilisateur connecté!";
	}
}else {
	echo "Les champs requis ne sont pas valides!";
}


?>