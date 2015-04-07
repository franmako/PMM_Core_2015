<?php
if(!empty($_SESSION['connected']) AND !empty($_SESSION['username'])){
	user_info_display();
	
	//get secret_question status
	$username= $_SESSION['username'];
	$query="SELECT secret_question FROM users_noyau WHERE username='$username'";
	$row = getRow($query);
	$secretquestion= $row['secret_question'];
	
	if($secretquestion == 0){
		echo '<p><a href="index.php?rq=secretQuestion">Cliquez ici pour ajouter une question secrète.</a></p>';
	}
}elseif(isset($_POST['username']) AND isset($_POST['password'])){
	//Verif username + mdp
	$db_connect= db_connect();
	$username = $_POST['username']; 
    $password = $_POST['password']; 
	$query= "SELECT * FROM users_noyau WHERE username = '$username' AND BINARY password = '$password';";
	$result= $db_connect->query($query);
		     
    if(mysqli_num_rows($result) == 1){
    			
        $row = mysqli_fetch_array($result);
        session_init($row); //Init variables de session
		
		//Update lastLogin time
		$query="UPDATE users_noyau SET last_connect=NOW() WHERE username='$username'";
		$db_connect->query($query);
		
        echo "<h1>Bienvenue ".$_SESSION['username']."</h1>";
		echo "<p>E-mail: ".$_SESSION['email']."</p>";
		echo "<p>Statut: ".$_SESSION['userlevel_label']."</p>";
        echo "<p>Redirection vers l'espace membres...</p>";
		echo '<meta http-equiv="refresh" content="2" url="index.php?rq=home"/>';
    }else{
        echo "<p>Erreur de connexion! </p>";
		echo '<meta http-equiv="refresh" content="5" url="index.php?rq=connection"/>';
    }
}else{
	include 'login_form.php';
}
    
?>
 