<?php 
$email= $_POST['email'];
print_r($email);
$db_connect= db_connect();
$query= "SELECT * FROM users_noyau WHERE email='$email'";
$verif_user= $db_connect->query($query);

if((mysqli_num_rows($verif_user)) == 1){
	$row=getRow($query);
	$isQuestion= $row['secret_question'];
	$userID= $row['id'];
	$email= $row['email'];
	
	$query= "SELECT * FROM user_status WHERE users_id=$userID";
	$row_userstatus= getRow($query);
	$user_status= $row_userstatus['level'];
	
	if (($isQuestion == 1) AND (($user_status != 3) OR ($user_status != 8))) {
		//echo "Success question found and valid";	
		$query_update= "UPDATE user_status SET level=5,label_level='En demande de mot de passe' WHERE users_id= $userID";
		$db_connect->query($query_update);
		
		echo '<meta http-equiv="refresh" content="5" url="index.php?rq=question_verif&id=$userID"/>';
		
		/*if($result){
			$emailfrom="notify@franmako.be";
			$from="From:";
			$from .= $emailfrom;
			$sujet= "Changement de mot de passe";
			$contenu=
			'Bonjour,
 			Pour changer votre mot de passe, veuillez cliquer sur le lien ci dessous
			ou copier/coller dans votre navigateur internet.
			http://193.190.65.94/he201139/ESSAIS/index.php?rq=reset_pass&log='.urlencode($username).'&cle='.urlencode($activation_key).'
			---------------
			Ceci est un mail automatique, Merci de ne pas y répondre.';
			$to=$email;
			$sent = mail($to,$sujet,$contenu,$from);
		
			echo '<p> Un mail avec les instructions de changement de mot de passe vient de vous être envoyé. </p>';
       	}*/
	}elseif ($isQuestion == 0) {
		echo "Vous n'avez pas de question et réponse secrète! Veuillez contacter l'admin pour changer votre mot de passe!";
	}elseif (($user_status == 3) OR ($user_status == 8)) {
		echo "Vous ne pouvez pas changer de mot de passe pour ce compte!";
	}
}elseif (mysqli_num_rows($result) == 0) {
	echo "Aucun utilisateur n'est associé à cet e-mail.";
}


?>