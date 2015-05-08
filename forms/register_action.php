<?php
if(!empty($_POST['username']) AND !empty($_POST['password_verif']) AND !empty($_POST['password']) AND !empty($_POST['email']) AND !empty($_POST['email_verif'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password_verif= $_POST['password_verif'];
	$email = $_POST['email'];
	$email_verif= $_POST['email_verif'];
	
	if($password_verif != $password){
		echo '<meta http-equiv="refresh" content="2" url="index.php?rq=newAccount&user='.$username.'&email='.$email.'"/>';
	}elseif (strlen($username) < USERNAME_MIN_SIZE) {
		echo "Le nom d'utilisateur est trop court!";
		echo'<meta http-equiv="refresh" content="4" url="index.php?rq=newAccount&email='.$email.'"/>';
	}elseif ($email_verif != $email) {
		echo '<meta http-equiv="refresh" content="2" url="index.php?rq=newAccount&user='.$username.'&email='.$email.'"/>';
	}elseif (!preg_match("#.*^(?=.{".PASSWORD_MIN_SIZE.",".PASSWORD_MAX_SIZE."})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $password)) {//Vérification de la sécurité du mot de passe 
		echo "Le mot de passe est trop court ou ne contient pas tous les caractère requis !";
	}else{	
		$db_connect=db_connect();
    	$query="SELECT * FROM users_noyau WHERE username = '$username';";
		$checkUserName= $db_connect->query($query);
		$row = mysqli_fetch_array($checkUserName);
		
		if(mysqli_num_rows($checkUserName) == 1){
			echo "<p>Le nom d'utilisateur est indisponible! Veuillez en choisir un autre.</p>";
			echo'<meta http-equiv="refresh" content="4" url="index.php?rq=newAccount&email='.$email.'"/>';
     	}else{
     		$salt= getSalt();
			$hash = getHash($password, $salt);
		
     		$activation_key = md5(microtime(TRUE)*100000);//Generate activation key
			$db_connect= db_connect();
			
        	$query= "INSERT INTO users_noyau (id,username, email,password,register_date,activation_date,avatar,secret_question) VALUES(NULL,'$username','$email','$hash',NOW(),NULL,0,0);";
        	$registerquery= $db_connect->query($query);
			$userID = $db_connect->insert_id;//Get last added id to table
			
			$query="INSERT INTO user_salts (id,salt,users_id) VALUES (NULL,'$salt','$userID')";
			$result= $db_connect->query($query);
			
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
				$emailfrom=CONTACT_NOTIFY;
				$from="From:";
				$from .= $emailfrom;
				$sujet= "[Activation] Activer votre compte";
				$contenu=
				'Merci de votre inscription,
 
				Pour activer votre compte, veuillez cliquer sur le lien ci dessous
				ou copier/coller dans votre navigateur internet.
				http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/'.'index.php?rq=account_activate&log='.urlencode($username).'&cle='.urlencode($activation_key).'
 				---------------
				Ceci est un mail automatique, Merci de ne pas y répondre.';
				$to=$email;
				$sent = mail($to,$sujet,$contenu,$from);
			
				echo '<p> Votre compte a été créé! Un mail d\'activation vient de vous être envoyé. </p>';
        	}
			
		}
	}		
}else{
	if(!empty($_POST['username']) AND !empty($_POST['email'])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		echo 'Le formulaire est incomplet! <a href="index.php?rq=newAccount&user='.$username.'&email='.$email.'">Cliquez ici</a> pour ré-essayer.';
	}elseif(!empty($_POST['username'])) {
		$username = $_POST['username'];
		echo 'Le formulaire est incomplet! <a href="index.php?rq=newAccount&user='.$username.'">Cliquez ici</a> pour ré-essayer.';
	}elseif (!empty($_POST['email'])) {
		$email = $_POST['email'];
		echo 'Le formulaire est incomplet! <a href="index.php?rq=newAccount&email='.$email.'">Cliquez ici</a> pour ré-essayer.';
	}else {
		echo 'Le formulaire est incomplet! <a href="index.php?rq=newAccount">Cliquez-ici pour ré-essayer</a>';
	}
	
}
?>