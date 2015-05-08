<?php 
if (!empty($_SESSION) AND ($_SESSION['userlevel'] != USER_BANNED OR $_SESSION['userlevel'] != USER_ACTIVATION OR $_SESSION['userlevel'] == USER_FROZEN)) {
	if(isset($_GET['id'])){
		$userID_user= $_GET['id'];
		echo 
		'
		<h3> Modifier votre adresse e-mail</h3>
		<form method="post" action="index.php?rq=email_modify&id="'.$userID_user.'" name="loginform" >
			Nouvelle adresse e-mail: <input type="email" name="email_new" id="email" />
    		Mot de passe: <input type="password" name="password" id="password" />
    		<p><input type="submit" name="login" id="login" value="Connexion" /></p>
		</form>
		';
	}else {
		echo 
		'
		<h3> Modifier votre adresse e-mail</h3>
		<form method="post" action="index.php?rq=email_modify" name="loginform" >
			Nouvelle adresse e-mail: <input type="email" name="email_new" id="email" />
    		Mot de passe: <input type="password" name="password" id="password" />
    		<p><input type="submit" name="login" id="login" value="Connexion" /></p>
		</form>
		';
	}
	
	
} else {
	unauthorizedAccess();
}


?>
