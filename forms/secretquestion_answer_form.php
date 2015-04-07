<?php
$userID= $_GET['id'];

$query= "SELECT * FROM user_status WHERE users_id=$userID";
$row_userstatus= getRow($query);
$user_status= $row_userstatus['level'];

if ($user_status == 5) {
	$question_query= "SELECT * FROM secret_question WHERE users_id=$userID";
	$row_question= getRow($question_query);
	$question= $row_question['question'];
	
	echo
	'
	<h3 align="center">Question Secrète</h3>
	<form method="post" action="index.php?rq=" name="loginform" >
		<table border="0" cellpadding="0" cellspacing="5">
			<p> echo $question;</p>
			<tr>
				<td align="right">
					<p class="signup">Réponse </p>				
				</td>
				<td>
					<input name="answer" type="text" size="100" maxlength="100" />
				</td>
			</tr>
			<tr>
				<td align="right" colspan="2">
					<input type="submit" name="submitok" value="Vérifier" />
				</td>
    		</tr>
		</table>
	</form>
	
	';
} else {
	echo "!!! Vous n'avez pas accès à cette page !!!";
}

?>