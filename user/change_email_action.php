<?php
if (isset($_POST['email_new']) AND isset($_POST['password'])) {
	$email_new= $_POST['email_new'];
	$password_typed= $_POST['password'];
	$db_connect= db_connect();
	
	$userID= $_SESSION['userID'];
	$email_current= $_SESSION['email'];
	$query_password_check= "SELECT * FROM users_noyau WHERE id=$userID AND password='$password_typed'";
	$password_check= $db_connect->query($query_password_check);
	
	if (mysqli_num_rows($password_check) == 1) {
		$query="SELECT * FROM users_noyau WHERE email = '$email_new';";
		$checkUserName= $db_connect->query($query);
		if (mysqli_num_rows($checkUserName) == 1) {
			echo "Un compte est déjà associé à cette adresse!";
		}else {
			$query_update_db= "UPDATE users_noyau SET email=$email_new WHERE id=$userID";
			$update_username= $db_connect->query($query_update_db);
			if($update_username){
				$emailfrom="notify@franmako.be";
				$from="From:";
				$from .= $emailfrom;
				$sujet= "Nom d'utilisateur changé!";
				$contenu=
				'Bonjour,
 
				L\'adresse e-mail associé à ce compte vient d\'être changé!
				La nouvelle adresse est : '.$email_new.'
 				---------------
				Ceci est un mail automatique, Merci de ne pas y répondre. Veuillez contacter l\'admin si ce changement ne vient pas de vous.';
				$to=$email_current;
				$sent = mail($to,$sujet,$contenu,$from);
			
				echo '<p> L\'adresse a été changée avec succès. Reconnectez vous pour voir le changement. </p>';
			}
		}
	}else {
		echo "Le mot de passe ne correspond pas à l'utilisateur connecté!";
	}
}else {
	echo "Les champs requis ne sont pas valides!";
}


?>