<?php 
$userid_manage= $_GET['id'];
	$query_avatar="SELECT * FROM avatar_filenames WHERE users_id=$userid_manage";
	$row_avatar=getRow($query_avatar);
	$avatar_filename= $row_avatar['filename'];
	
	$query_users= "SELECT * FROM users_noyau WHERE id=$userid_manage";
	$row_users= getRow($query_users);
	$username= $row_users['username'];
	$register_date= $row_users['register_date'];
	$last_connect= $row_users['last_connect'];
	$email= $row_users['email'];

	
	$query_status= "SELECT * FROM user_status WHERE users_id=$userid_manage";
	$row_status= getRow($query_status);
	$status= $row_status['label_level'];
	
	echo '<img src="images/avatars/'.$avatar_filename.'" alt="Profile Image" style="width:150px;height:150px"><br/>';
	echo '<a href="index.php?rq=avatar_upload">[Modifier]</a>';
    echo '<p>Utilisateur: <b>'.$username.'</b><a href="index.php?rq=change_username&id='.$userid_manage.'">[Modifier]</a></p>';
	echo "<p>Date d'inscription: ".$register_date."<p>";
	echo '<p>Dernière connexion: '.$last_connect.'</p>';
	echo '<p>Votre email est: '.$email.'<a href="index.php?rq=change_email&id='.$userid_manage.'">[Modifier]</a></p> ';
	echo "<p>Statut : <b>".$status."</b></p>";
	echo '<a href="index.php?rq=change_password">[Changer le mot de passe du compte]</a>';
?>