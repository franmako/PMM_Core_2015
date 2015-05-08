<?php 
if (!empty($_POST['password_new']) AND !empty($_POST['password_verif']) AND !empty($_GET['log'])) {
	$password_new= $_POST['password_new'];
	$password_verif= $_POST['password_verif'];
	$username= $_GET['log'];
	$user_level= $_POST['user_level'];
	if (!preg_match("#.*^(?=.{".PASSWORD_MIN_SIZE.",".PASSWORD_MAX_SIZE."})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $password_new)) {//Vérification de la sécurité du mot de passe 
		echo "Le mot de passe est trop court ou ne contient pas tous les caractère requis !";
	}elseif ($password_new == $password_verif) {
		$query_user= "SELECT * FROM users_noyau WHERE username='$username'";
		$row_user= getRow($query_user);
		if ($row_user) {
			$userID= $row_user['id'];
			$email= $row_user['email'];
			$hash_db= $row_user['password'];
			$query_salt="SELECT * FROM user_salts WHERE users_id=$userID";
			$row_salt=getRow($query_salt);
			$salt_db= $row_salt['salt'];
			$hash_new= crypt($password_new,$salt_db);
			$db_connect= db_connect();
			$query_change_password= "UPDATE users_noyau SET password='$hash_new' WHERE id=$userID";
			$result_change_password= $db_connect->query($query_change_password);
			if ($result_change_password) {
				$query_status= "SELECT * FROM user_status WHERE users_id=$userID";
				$row_status= getRow($query_status);
				if ($row_status) {
					$statusID= $row_status['id'];
					$status= $row_status['level'];
					$status_label= $row_status['label_level'];
					$query_status= "UPDATE user_status SET level=,label_level='Normal' WHERE users_id=$userID";
					$result_update= $db_connect->query($query_status);
					if ($result_update) {
						$emailfrom=CONTACT_NOTIFY;
						$from="From:";
						$from .= $emailfrom;
						$sujet= "Mot de passe changé!";
						$contenu=
						'Bonjour,
 						Le mot de passe associé à cet adresse e-mail vient d\'être changé!
 						---------------
						Ceci est un mail automatique, Merci de ne pas y répondre. Veuillez contacter l\'admin si ce changement ne vient pas de vous.';
						$to=$email;
						$sent = mail($to,$sujet,$contenu,$from);
						
						echo "Mot de passe changé avec succès!";
					} else {
						echo "Erreur! Veuillez recommencer la procédure.";
					}
				} else {
					echo "Erreur! Veuillez recommencer la procédure.";
				}
			} else {
				echo "Erreur du changement de mot de passe! Veuillez contacter l'admin.";
			}	
	} else {
		echo "Erreur! Veuillez recommencer la procédure.";
	}		
} else {
	echo "Les deux mots de passe ne sont pas les mêmes!";
}	
} else {
	echo "Les champs requis sont incomplets!";
}

?>