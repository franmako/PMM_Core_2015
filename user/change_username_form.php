<?php 
if (!empty($_SESSION) AND ($_SESSION['userlevel'] != USER_BANNED OR $_SESSION['userlevel'] != USER_ACTIVATION OR $_SESSION['userlevel'] == USER_FROZEN)) {
	if(isset($_GET['id'])){
		$userID_user= $_GET['id'];
		echo 
		'
		<h3> Modifier votre nom d\'utilisateur</h3>
		<form method="post" action="index.php?rq=username_modify&id='.$userID_user.'" name="loginform" >
			Nouveau nom d\'utilisateur: <input type="text" name="username_new" id="username" /><br />
    		Mot de passe: <input type="password" name="password" id="password" /><br />
   	 		<p><input type="submit" name="login" id="login" value="Modifier nom d\'utilisateur" /></p>
		</form>
		';
	}else {
		echo 
		'
		<h3> Modifier votre nom d\'utilisateur</h3>
		<form method="post" action="index.php?rq=username_modify" name="loginform" >
			Nouveau nom d\'utilisateur: <input type="text" name="username_new" id="username" /><br />
    		Mot de passe: <input type="password" name="password" id="password" /><br />
   	 		<p><input type="submit" name="login" id="login" value="Modifier nom d\'utilisateur" /></p>
		</form>
		';
	}
	
} else {
	unauthorizedAccess();
}
?>
