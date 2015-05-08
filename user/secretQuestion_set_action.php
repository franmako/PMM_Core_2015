<?php 
if(!empty($_SESSION) AND ($_SESSION['userlevel'] != 6 OR $_SESSION['userlevel'] != 8) AND isset($_POST['question']) AND isset($_POST['answer'])){
	$question= $_POST['question'];
	$answer= $_POST['answer'];
	$userID= $_SESSION['userID'];
	$db_connect= db_connect();
	$query_salt= "SELECT * FROM user_salts WHERE users_id= $userID";
	$row_salt= getRow($query_salt);
	if ($row_salt) {
		$salt= $row_salt['salt'];
		$hash_answer= getHash($answer, $salt);
		$query_secret= "INSERT INTO secret_questions (users_id,question,answer,id) VALUES($userID,'$question','$hash_answer',NULL);";
		$result_secret= $db_connect->query($query_secret);
		if ($result_secret) {
			$query_update= "UPDATE users_noyau SET secret_question=1 WHERE id=$userID";
			$result_update= $db_connect->query($query_update);
			if ($result_update) {
				echo "Question et réponse ajoutés avec succès!";
			}else {
				echo "Erreur! Veuillez recommencer la procédure";
				//print_r(1);
			}
		} else {
			echo "Erreur! Veuillez recommencer la procédure";
			//print_r(2);
		}	
	} else {
		echo "Erreur! Veuillez recommencer la procédure.";
		//print_r(3);
	}
}elseif (empty($_POST['question'])) {
	echo "Question non valide!";	
}elseif (empty($_POST['answer'])) {
	echo "Réponse non valide!";
}elseif (empty($_SESSION['connected'])) {
	unauthorizedAccess();
}
?>