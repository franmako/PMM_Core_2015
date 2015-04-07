<?php 
if(!empty($_SESSION['connected']) AND isset($_POST['question']) AND isset($_POST['answer'])){
	$question= $_POST['question'];
	$answer= $_POST['answer'];
	$userID= $_SESSION['userID'];
	print_r($userID);
	$db_connect= db_connect();
	$query= "INSERT INTO secret_questions (users_id,question,answer) VALUES($userID,'$question','$answer');";
    $result= $db_connect->query($query);
	$query= "UPDATE users_noyau SET secret_question=1 WHERE id=$userID";
	$result= $db_connect->query($query);
	echo "Question secrète ajouté!";
}elseif (empty($_POST['question'])) {
	echo "Question non valide!";	
}elseif (empty($_POST['answer'])) {
	echo "Réponse non valide!";
}elseif (empty($_SESSION['connected'])) {
	echo "Vous n'avez pas l'accès à cette page!";
}

?>