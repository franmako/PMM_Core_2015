<?php
function getUserType($userID){
	$db_connect= db_connect();
	$query="SELECT * FROM user_status WHERE users_id=$userID";
	$result= $db_connect->query($query);
	if(mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_array($result);
		$usertype= $row['level'];
	}
	return ($usertype);
}
function getUserType_label($userID){
	$db_connect= db_connect();
	$query="SELECT * FROM user_status WHERE users_id=$userID";
	$row= getRow($query);
	$usertype_label= $row['label_level'];
	return ($usertype_label);
}
function session_init($row){
	$userID= $row['id'];	
	$_SESSION['userID']= $userID;	
	$_SESSION['username'] = $row['username'];
	$_SESSION['email']= $row['email'];
	$_SESSION['userlevel']= getUserType($userID);
	$_SESSION['userlevel_label']= getUserType_label($userID);
	$_SESSION['connected'] = 1;
	$_SESSION['register_date']= $row['register_date'];
	$_SESSION['secretquestion']= $row['secret_question'];
}

function isAdmin(){
	if(isset($_SESSION['userlevel']) AND $_SESSION['userlevel']  == 0){
		$isAdmin= TRUE;
		return $isAdmin;
	}else {
		$isAdmin= FALSE;
		return $isAdmin;
	}
}
function user_info_display(){
	echo'<h3>Profil</h3>';
    echo '<p>Utilisateur: <b>'.$_SESSION['username'].'</b><a href="index.php?rq=change_username">[Modifier]</a></p>';
	echo "<p>Date d'inscription: ".$_SESSION['register_date']."<p>";
	echo '<p>Votre email est: '.$_SESSION['email'].'<a href="index.php?rq=change_email">[Modifier]</a></p> ';
	echo "<p>Statut : <b>".$_SESSION['userlevel_label']."</b></p>";
} 
?>