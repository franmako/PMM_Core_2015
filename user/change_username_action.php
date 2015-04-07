<?php
if (isset($_POST['username_new']) AND isset($_POST['password'])) {

	$username_new= $_POST['username_new'];
	$password_typed= $_POST['password'];
	$db_connect= db_connect();
	
	$userID= $_SESSION['userID'];
	$email= $_SESSION['email'];
	$query_password_check= "SELECT * FROM users_noyau WHERE id=$userID AND password='$password_typed'";
	$password_check= $db_connect->query($query_password_check);

	if (mysqli_num_rows($password_check) == 1) {
		//echo "succes2";
		$query="SELECT * FROM users_noyau WHERE username = '$username_new';";
		$checkUserName= $db_connect->query($query);
		if (mysqli_num_rows($checkUserName) == 1) {
			echo "Le nom d'utilisateur est indisponible! Veuillez en choisir un autre.";
		}else {
			//echo "succes3";
			$query_update_db= "UPDATE users_noyau SET username='$username_new' WHERE id=$userID";
			$update_username= $db_connect->query($query_update_db);
			if($update_username){
				//echo "success4";
				$emailfrom="notify@franmako.be";
				$from="From:";
				$from .= $emailfrom;
				$sujet= "Nom d'utilisateur changé!";
				$contenu=
				'Bonjour,
 
				Le nom d\'utilisateur associé à cet adresse e-mail vient d\'être changé!
				Le nouveau nom d\'utilidateur est : '.$username_new.'
 				---------------
				Ceci est un mail automatique, Merci de ne pas y répondre. Veuillez contacter l\'admin si ce changement ne vient pas de vous.';
				$to=$email;
				$sent = mail($to,$sujet,$contenu,$from);
			
				echo '<p> Le nom d\'utilisateur a été changé avec succès. Reconnectez vous avec le nouveau nom pour voir le changement. </p>';
			}
		}
	}else {
		echo "Le mot de passe ne correspond pas à l'utilisateur connecté!";
	}
}else {
	echo "Les champs requis ne sont pas valides!";
}
?>