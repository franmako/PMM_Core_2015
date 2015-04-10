<?php
//$username_minsize= $ini['Register']['username_min_size'];
if(!empty($_POST['username']) AND !empty($_POST['password_verif']) AND !empty($_POST['password']) AND !empty($_POST['email']) AND !empty($_POST['email_verif'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password_verif= $_POST['password_verif'];
	$email = $_POST['email'];
	$email_verif= $_POST['email_verif'];
	
	if($password_verif != $password){
		echo '<meta http-equiv="refresh" content="2" url="index.php?rq=accountCreateRetry_pwd_verif&user='.$username.'&email='.$email.'"/>';
	}elseif ($email_verif != $email) {
		echo '<meta http-equiv="refresh" content="2" url="index.php?rq=accountCreateRetry_email_verif&user='.$username.'&email='.$email.'"/>';
	}else{
		$db_connect=db_connect();
    	$query="SELECT * FROM users_noyau WHERE username = '$username';";
		$checkUserName= $db_connect->query($query);
		$row = mysqli_fetch_array($checkUserName);
		
		if(mysqli_num_rows($checkUserName) == 1){
		echo '<meta http-equiv="refresh" content="5" url="index.php?rq=accountCreateRetry_uname"/>';
     	}else{
     		$activation_key = md5(microtime(TRUE)*100000);//Generate activation key
			$db_connect= db_connect();
			
        	$query= "INSERT INTO users_noyau (id,username, email,password,register_date,activation_date,avatar,secret_question) VALUES(NULL,'$username','$email','$password',NOW(),NULL,0,0);";
        	$registerquery= $db_connect->query($query);
			$userID = $db_connect->insert_id;//Get last added id to table
			
			$db_connect= db_connect();
        	$query= "INSERT INTO user_status (users_id,level,label_level,id) VALUES($userID,3,'En cours d\'activation',NULL);";
        	$result= $db_connect->query($query);
        	
        	$db_connect= db_connect();
        	$query= "INSERT INTO account_activation (users_id,cle,id) VALUES($userID,'$activation_key',NULL);";
        	$result= $db_connect->query($query);
			
			$db_connect= db_connect();
			$query="INSERT INTO avatar_filenames (id,users_id,filename) VALUES (NULL,$userID,'default.png')";
			$result= $db_connect->query($query);
			
        	if($registerquery){
				$emailfrom="notify@franmako.be";
				$from="From:";
				$from .= $emailfrom;
				$sujet= "[Activation] Activer votre compte";
				$contenu=
				'Merci de votre inscription,
 
				Pour activer votre compte, veuillez cliquer sur le lien ci dessous
				ou copier/coller dans votre navigateur internet.
 				http://193.190.65.94/he201139/ESSAIS/index.php?rq=account_activate&log='.urlencode($username).'&cle='.urlencode($activation_key).'
 				---------------
				Ceci est un mail automatique, Merci de ne pas y répondre.';
				$to=$email;
				$sent = mail($to,$sujet,$contenu,$from);
			
				echo '<p> Votre compte a été créé! Un mail d\'activation vient de vous être envoyé. </p>';
        	}
			
		}
	}		
}elseif (empty($_POST['username'])) {
	echo "Le nom d'utilisateur n'est pas valide!";
	echo '<meta http-equiv="refresh" content="5" url="index.php?rq=newAccount&email=$_POST[\'email\']"/>';
}elseif (empty($_POST['password'])) {
	echo "Le mot de passe n'est pas valide!";
	echo '<meta http-equiv="refresh" content="5" url="index.php?rq=newAccount&email=$_POST[\'email\']&user=$_POST[\'username\']"/>';
}elseif (empty($_POST['password_verif'])) {
	echo "La vérfication du mot de passe n'est pas valide!";
	echo '<meta http-equiv="refresh" content="5" url="index.php?rq=newAccount&email=$_POST[\'email\']&user=$_POST[\'username\']"/>';
}elseif (empty($_POST['email'])) {
	echo "L'email n'est pas valide!";
	echo '<meta http-equiv="refresh" content="5" url="index.php?rq=newAccount&user=$_POST[\'username\']"/>';
}elseif (empty($_POST['email_verif'])) {
	echo "La vérification de l'email n'est pas valide!";
	echo '<meta http-equiv="refresh" content="5" url="index.php?rq=newAccount&email=$_POST[\'email\']&user=$_POST[\'username\']"/>';
}
?>