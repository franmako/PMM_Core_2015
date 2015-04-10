<?php 
$userID_user= $_GET['id'];
echo 
'
<h3> Modifier votre adresse e-mail</h3>
<form method="post" action="index.php?rq=email_modify&id='.$userID_user.'" name="loginform" >
	Nouvelle adresse e-mail: <input type="email" name="email_new" id="email" />
    Mot de passe: <input type="password" name="password" id="password" />
    <p><input type="submit" name="login" id="login" value="Connexion" /></p>
</form>
';
?>
