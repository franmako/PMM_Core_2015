<?php 
if (!empty($_POST['email'])) {
	$email= $_POST['email'];
	$db_connect= db_connect();
	$query_user= "SELECT * FROM users_noyau WHERE email='$email'";
	$row_user= getRow($query_user);
	if ($row_user) {
		$isQuestion= $row_user['secret_question'];
		$userID= $row_user['id'];
		$query_status= "SELECT * FROM user_status WHERE users_id=$userID";
		$row_status= getRow($query_status);
		$status= $row_status['level'];
		if (($status != USER_BANNED AND $row_status != USER_ACTIVATION) AND $isQuestion == 1) {
			$query_update= "UPDATE user_status SET level=5,label_level='En demande de mot de passe' WHERE users_id= $userID";
			$update= $db_connect->query($query_update);
			if ($update) {
				$query_question= "SELECT * FROM secret_questions WHERE users_id=$userID";
				$row_question= getRow($query_question);
				if ($row_question) {
					$question= $row_question['question'];
					include 'forms/secret_answer_form.php';
				} else {
					echo "Erreur! Veuillez recommencer la procédure.";
				}
			} else {
				echo "Erreur! Veuillez recommencer la procédure.";
			}	
		}elseif ($isQuestion != 1) {
			echo "Vous n'avez pas de question et réponse secrète! Veuillez contacter l'admin pour changer votre mot de passe!";
		}elseif ($status == USER_BANNED OR $status == USER_ACTIVATION) {
			echo "Le statut de ce compte ne vous permet pas de changer de mot de passe!";
		}else {
			echo "Erreur! Veuillez recommencer la procédure.";
		}	
	} else {
		echo "Aucun utilisateur est associé à cette adresse e-mail";
	}
} else {
	echo "Adresse e-mail invalide!";
}

?>