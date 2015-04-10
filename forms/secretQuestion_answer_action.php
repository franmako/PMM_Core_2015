<?php
$answer= $_POST['answer'];
$username= $_POST['username'];
$db_connect= db_connect();
$query= "SELECT * FROM users_nouyau WHERE username=$username";
$row= getRow($query);
$userID= $row['id'];
$query= "SELECT * FROM secret_questions WHERE users_id=$userID";
$row= getRow($query);
$answer_db= $row['answer'];
if ($answer == $answer_db) {
	echo "succes";
}else {
	echo "Mauvaise réponse!";
} 
?>