<?php 
echo 
'
<h3> Modifier votre mot de passe</h3>
<p>Le mot de passe doit contenir au moins 8 caractères, un majuscule, une minuscule, un chiffre et un caractère spécial.</p> 
<form method="post" action="index.php?rq=password_reset_action&log='.$username.'" name="loginform" >
	Statut: <input value="'.$user_level.'" type="text" name="user_level" readonly/><br/>
	Nouveau mot de passe: <input type="password" name="password_new"/> </br>
	Répéter nouveau mot de passe: <input type="password" name="password_verif"/></br>
    <p><input type="submit" name="login" id="login" value="Changer de mot de passe" /></p>
</form>
';
?>
