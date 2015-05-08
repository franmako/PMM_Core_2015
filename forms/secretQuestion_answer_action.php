<?php
if (!empty($_POST['answer']) AND !empty($_POST['username']) AND !empty($_POST['user_level'])) {
	$user_level= $_POST['user_level'];
	$answer= $_POST['answer'];
	$username= $_POST['username'];
	$query_user	= "SELECT * FROM users_noyau WHERE username='$username'";
	$row_user= getRow($query_user);
	if ($row_user) {
		$userID= $row_user['id'];
		$query_question= "SELECT * FROM secret_questions WHERE users_id=$userID";
		$row_question= getRow($query_question);
		if ($row_question) {
			$answer_db_hash= $row_question['answer'];
			$query_salt="SELECT * FROM user_salts WHERE users_id=$userID";
			$row_salt=getRow($query_salt);
			$salt_db= $row_salt['salt'];
			$hash= crypt($answer,$salt_db);
			if (hash_equals($answer_db_hash, $hash)){
				include 'forms/password_reset_form.php';
			}else {
				echo "La réponse est incorrecte!";
			}
		} else {
			echo "Erreur! Veuillez recommencer la procédure.";
		}
	} else {
		echo "Erreur! Veuillez recommencer la procédure.";
	}
} else {
	echo "Les champs requis sont incomplets!";
}


?>