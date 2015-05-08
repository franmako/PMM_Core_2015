<?php 
echo
	'
	<h3>'.$question.'</h3>
	<form method="post" action="index.php?rq=secret_answer_action">
		Utilisateur: <input type="text" name="username" size="35"/><br/>
		Statut: <input type="text" name="user_level" value="'.$status.'" readonly/><br/>
		Réponse: <input type="text" name="answer" size="100"/><br/>
	<input type="submit" name="submit" value="Répondre"/>
	</form>
	';
?>
