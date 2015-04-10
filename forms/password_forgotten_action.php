<?php 
$email= $_POST['email'];
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
		
		$query= "SELECT * FROM secret_questions WHERE users_id=$userID";
		$row= getRow($query);
		$question= $row['question'];
		echo
		'
		<h3>'.$question.'</h3>
		<form method="post" action="index.php?rq=secret_answer">
			Utilisateur: <input type="text" name="username" size="35"/><br/>
			Réponse: <input type="text" name="answer" size="100"/><br/>
			<input type="submit" name="submit" value="Répondre"/>
		</form>
		';
		$_POST['userID']= $userID;
		
	}elseif ($isQuestion == 0) {
		echo "Vous n'avez pas de question et réponse secrète! Veuillez contacter l'admin pour changer votre mot de passe!";
	}elseif (($user_status == 3) OR ($user_status == 8)) {
		echo "Vous ne pouvez pas changer de mot de passe pour ce compte!";
	}
}elseif (mysqli_num_rows($result) == 0) {
	echo "Aucun utilisateur n'est associé à cet e-mail.";
}


?>