<?php
if (isset($_POST['email_new']) AND isset($_POST['password'])) {

	$email_new= $_POST['email_new'];
	$password_typed= $_POST['password'];
	$db_connect= db_connect();
	
	$userID= $_SESSION['userID'];
	$email_current= $_SESSION['email'];
	$username= $_SESSION['username'];
	$query_password_check= "SELECT * FROM users_noyau WHERE id=$userID AND password='$password_typed'";
	$password_check= $db_connect->query($query_password_check);

	if (mysqli_num_rows($password_check) == 1) {
		$query="SELECT * FROM users_noyau WHERE email = '$email_new';";
		$checkUserName= $db_connect->query($query);
		if (mysqli_num_rows($checkUserName) == 1) {
			echo "Un compte est déjà associé à cette adresse e-mail.";
		}else {
			$query_update_db= "UPDATE users_noyau SET email='$email_new' WHERE id=$userID";
			$update_username= $db_connect->query($query_update_db);
			if($update_username){
				$activation_key = md5(microtime(TRUE)*100000);//Generate activation key
				
				$query_status_update= "UPDATE user_status SET level= 4,label_level='En cours de réactivation' WHERE users_id=$userID;";
        		$db_connect->query($query_status_update);
				
				$query_actication_update= "UPDATE account_activation cle=$activation_key WHERE users_id=$userID;";
        		$db_connect->query($query_actication_update);
        		
				$emailfrom="notify@franmako.be";
				$from="From:";
				$from .= $emailfrom;
				$sujet= "[Activation] Activer votre compte";
				$contenu=
				'Bonjour,
 
				Pour activer votre compte avec cet adresse e-mail, veuillez cliquer sur le lien ci dessous
				ou copier/coller dans votre navigateur internet.
 				http://193.190.65.94/he201139/ESSAIS/index.php?rq=account_activate&log='.urlencode($username).'&cle='.urlencode($activation_key).'
 				---------------
				Ceci est un mail automatique, Merci de ne pas y répondre.';
				$to=$email_new;
				$sent = mail($to,$sujet,$contenu,$from);
				
				$emailfrom="notify@franmako.be";
				$from="From:";
				$from .= $emailfrom;
				$sujet= "Adresse e-mail changé!";
				$contenu=
				'Bonjour,
 
				L\'adresse e-mail associée à cet utilisateur vient d\'être changé!
				La nouvelle adresse est : '.$email_new.'
 				---------------
				Ceci est un mail automatique, Merci de ne pas y répondre. Veuillez contacter l\'admin si ce changement ne vient pas de vous.';
				$to=$email_current;
				$sent = mail($to,$sujet,$contenu,$from);
				
				
			
				echo '<p> L\'adresse e-mail a été changée avec succès. Celui-ce doit d\'abord être activé. </p>';
			}
		}
	}else {
		echo "Le mot de passe ne correspond pas à l'utilisateur connecté!";
	}
}else {
	echo "Les champs requis ne sont pas valides!";
}