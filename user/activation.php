<?php
$db_connect=mysqli_connect(HOST,USER,PASSWORD,DATABASE) or die("MySQL Error: " . mysql_error());
$query='SELECT * FROM users_projet WHERE Username = "$_GET[\'log\']";';
$checkUser= $db_connect->query($query);
if(mysqli_num_rows($checkUser) == 1){
	$activation_key= $_GET['cle'];
	$row = mysqli_fetch_array($checkUser);
	$cle_bdd= $row['ActivationKey'];
	$user_status= $row['UserType'];
	
	if(($user_status == 2) AND ($activation_key == $activation_key_db)){
		$query='UPDATE users_projet SET UserType=1 where Username="$username";';
		$activate_account= $db_connect->query($query);
		if($activate_account){
			echo "Compte activé!";
		}	
	}elseif(user_status == 1) {
		echo "Votre compte est déjà activé!";		
	}else {
		echo "Erreur d'activation! Veullez contacter l'administrateur";
	}
}

?>